<?php

namespace App\Helpers;

use Carbon\Carbon;
use Exception;

class OCR
{
    public static function read($path)
    {
        $client = new \Aws\Textract\TextractClient([
            'version' => 'latest',
            'region' => config("aws.region"),
            'credentials' => [
                'key'    => config("aws.credentials.key"),
                'secret' => config("aws.credentials.secret")
            ]
        ]);

        $data = file_get_contents(public_path($path));
        $adapterId = "9d8632e90b9b";
        $result = $client->analyzeDocument([
            'AdaptersConfig' => [
                "Adapters" => [
                    [
                        "AdapterId" => $adapterId,
                        "Version" => "1"
                    ]
                ]
            ],
            'Document' => [
                'Bytes' => $data,
            ],
            'FeatureTypes' => ['QUERIES'],
            "QueriesConfig" => [
                "Queries" => [
                    ["Text" => "What is the bill date?"],
                    ["Text" => "What is the VAT rate percentage?"],
                    ["Text" => "What is the total amount of bill?"],
                    ["Text" => "What is the title of bill?"],
                ]
            ]
        ]);

        $blocks = $result['Blocks'];
        $title = null;
        $total = null;
        $vat = null;
        $date = null;

        foreach ($blocks as $block) {
            if ($block['BlockType'] === 'QUERY_RESULT') {
                $queryResult = $block['Text'] ?? ''; // Extract the text for the query result
                $queryId = $block['Id'];
                $queryText = ''; // Initialize to hold query text

                // Find corresponding QUERY block using Relationships
                foreach ($blocks as $searchBlock) {
                    if ($searchBlock['BlockType'] === 'QUERY' && isset($searchBlock['Relationships'])) {
                        foreach ($searchBlock['Relationships'] as $relationship) {
                            if (in_array($queryId, $relationship['Ids'])) {
                                $queryText = $searchBlock['Query']['Text'] ?? ''; // Get the query text
                                break 2; // Exit the loop when found
                            }
                        }
                    }
                }

                switch ($queryText) {
                    case "What is the bill date?":
                        $date = $queryResult;
                        break;
                    case "What is the VAT rate percentage?":
                        $vat = $queryResult;
                        break;
                    case "What is the total amount of bill?":
                        $total = $queryResult;
                        break;
                    case "What is the title of bill?":
                        $title = $queryResult;
                        break;
                }
            }
        }
        return [
            "title" => $title,
            "total" => $total ? self::convertToFloat($total): null,
            "vat" => $vat ? self::convertToInt($vat) : null,
            "date" => $date ? self::convertDateToYMD($date) : null,
        ];
    }

    public static function convertDateToYMD($dateString): ?string
    {
        $formats = [
            'd/m/Y',  // 15/10/2024
            'd-m-Y',  // 14-10-2024
            'd M Y',  // 15 Oct 2024
            'Y-m-d',  // 2024-10-07
        ];

        // Try manually handling common formats first
        foreach ($formats as $format) {
            try {
                $date = Carbon::createFromFormat($format, $dateString);
                return $date->format('Y-m-d');
            } catch (Exception $e) {
                continue;
            }
        }

        try {
            $date = Carbon::parse($dateString);
            return $date->format('Y-m-d');
        } catch (Exception $e) {
            return null;
        }
    }

    public static function convertToFloat($input): float
    {
        // Define a regex pattern to remove any currency symbols or text
        $pattern = '/[^\d.,-]/';  // Removes any non-numeric character except comma, dot, and minus

        // Remove currency symbols and letters using regex
        $cleanedInput = preg_replace($pattern, '', $input);

        // Convert European decimal format (comma as decimal separator) to dot format for float conversion
        if (strpos($cleanedInput, ',') !== false && strpos($cleanedInput, '.') === false) {
            $cleanedInput = str_replace(',', '.', $cleanedInput);
        }

        // Remove any remaining commas if both comma and dot exist (e.g. 1,000.50 -> 1000.50)
        $cleanedInput = str_replace(',', '', $cleanedInput);

        // Convert the cleaned string to a float
        return floatval($cleanedInput);
    }

    public static function convertToInt($input): float
    {
        // Define a regex pattern to remove any currency symbols or text
        $pattern = '/[^\d.,-]/';  // Removes any non-numeric character except comma, dot, and minus

        // Remove currency symbols and letters using regex
        $cleanedInput = preg_replace($pattern, '', $input);

        // Convert European decimal format (comma as decimal separator) to dot format for proper conversion
        if (strpos($cleanedInput, ',') !== false && strpos($cleanedInput, '.') === false) {
            $cleanedInput = str_replace(',', '.', $cleanedInput);
        }

        // Remove any remaining commas if both comma and dot exist (e.g. 1,000.50 -> 1000.50)
        $cleanedInput = str_replace(',', '', $cleanedInput);

        // Convert the cleaned string to an integer by rounding down
        return intval($cleanedInput);
    }
}
