<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class Export
{
    public static function csv($headers, $body, $filename, $path = null): array
    {
        try {
            if ($path){
                $path = "$path/$filename.csv";
            }else{
                $path = "files/exports/$filename.csv";
            }
            $fullPath = public_path($path);
            $file = fopen($fullPath, 'w');
            fputcsv($file, $headers);
            foreach ($body as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
            return [
                true,
                asset($path)
            ];
        }catch (\Exception $e){
            Log::error($e);
            return [
                false,
                null
            ];
        }
    }
}
