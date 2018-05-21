<?php

namespace App\FileControl;

use File;
use Storage;
use DateTime;


/**
*. class to format and upload files, mostly for images
*/
class FileControl
{

	private $date;


	 public static function storeFile($file, $location)
	 {
	 	  $date = new DateTime();
	 	  $fileName = "{$date->getTimestamp()}_{$file->getClientOriginalName()}";
	 	  Storage::disk($location)->put($fileName, File::get($file));

	 	   return $fileName;
	 }

	 public static function deleteFile($path, $location)
	 {
	 	$path = parse_url($path, PHP_URL_PATH);
        $pathFragments = explode('/', $path);
        $img = end($pathFragments);
        $response  = Storage::disk($location)->delete($img);

        return $response;
	 }

	 public static function updateFile($path, $file, $location)
	 {
	 	 self::deleteFile($path, $location);
	 	 $fileName =  self::storeFile($file, $location);

	 	 return $fileName;
	 }


}
