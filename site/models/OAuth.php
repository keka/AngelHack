<?php

class MeetupOAuth
{
	public $id;
	public $code;

	public function __construct()
	{

	}

	public static function create($code)
	{
		$db = DB::getInstance();

		$qStr = "INSERT INTO OAuth (oauth_code) VALUES (:oauth_code)";

		$db->query($qStr, array(":oauth_code" => $code));

		$oauth = new self();
		$oauth->id = $db->lastInsertID();
		$oauth->code = $code;


		return $oauth;
	}
}