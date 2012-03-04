<?php

class RawEvent
{

	public static function set($userId, $data)
	{
		$myFile = "/tmp/rawEvent-".$userId.".txt";
		$fh = fopen($myFile, 'w');
		fwrite($fh, $data);
		fclose($fh);
	}

	public static function get($userId)
	{
		$myFile = "/tmp/rawEvent-".$userId.".txt";

		//check file
		if(file_exists($myFile))
		{
			$fh = fopen($myFile, 'r');
			$theData = fread($fh, filesize($myFile));
			fclose($fh);

			return $theData;
		}

		return null;
	}
}
