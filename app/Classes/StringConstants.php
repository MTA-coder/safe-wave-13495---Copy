<?php


namespace App\Classes;


use Illuminate\Support\Str;

class StringConstants
{


    public static $fileFolder = "Files";
    public static $introductionsFolder = 'media/course/introductions';
    public static $videoFolder = 'media/course/introductions/video';


    public static $MB_10 = 1e+7;
    public static $minPercentageCancelCourse = 5;

    public static function  getShortPath($storageType)
    {
        return 'media/' . $storageType . '/';
    }

    public static function getFileName($fileExtension)
    {
        return time() . '.' . $fileExtension;
    }

    public static function getFullPath($shortPath)
    {
        return config('app.url') . '/storage/' . $shortPath;
    }

    public static function getPathFileName($path)
    {
        return Str::after($path, config('app.url') . '/storage');
    }

    public static function getFileExtension($path)
    {
        return Str::after($path, ".");
    }
}
