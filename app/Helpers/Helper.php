<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

class Helper
{
    public static function getDefaultTimestampFormat(): string
    {
        return config('app.default_timestamp_format');
    }
    public static function getDefaultDateFormat(): string
    {
        return config('app.default_timestamp_format');
    }

    public static function getDateOnly($date): string|null
    {
        return $date ? Carbon::parse($date)->format(self::getDefaultDateFormat()) : null;
    }
    public static function getDateTime($date): string|null
    {
        return $date ? Carbon::parse($date)->format(self::getDefaultTimestampFormat()) : null;
    }
    public static function getDateDiffHum($date): string|null
    {
        return $date ? Carbon::parse($date)->diffForHumans() : null;
    }

    public static function version($path, $type): string
    {
        $path = "/" . $path;
        try {
            $version = "?v=" . File::lastModified(public_path() . $path);
        }
        catch (\Exception $e){
            $version = "";
        }
        if ($type == "css"){
            return "<link href='{$path}{$version}' rel='stylesheet' type='text/css'/>";
        }
        return "<script src='{$path}{$version}'></script>";
    }

    public static function getOnlyNumbers($string)
    {
        return preg_replace('/[^0-9]/', '', $string);
    }
}
