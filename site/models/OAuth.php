<?php

class MeetupOAuth
{
	public $id;
	public $code;
	public $session;
	public $updateToken;
	public $accessToken;

	public function __construct()
	{

	}

	public static function create($code,$session)
	{
		$db = DB::getInstance();

		$qStr = "INSERT INTO OAuth (oauth_code, session_id) VALUES (:oauth_code, :session_id)
					on duplicate key update oauth_code = :oauth_code2";

		$db->query($qStr, array(":oauth_code" => $code, ":oauth_code2" => $code,":session_id" => $session));

		$oauth = new self();
		$oauth->id = $db->lastInsertID();
		$oauth->code = $code;
		$oauth->session = $session;

		return $oauth;
	}

	public static function getBySessionId($session)
	{
		$db = DB::getInstance();

		$qStr = "select id, oauth_code, session_id, access_token, update_token from OAuth where session_id= :session_id";

		$query=$db->query($qStr, array(":session_id" => $session));
		$results = $query->fetchAll();
		$oauth=null;
		if(count($results) > 0)
		{
			$oauth = new self();
			$oauth->id = $results[0]['id'];
			$oauth->code = $results[0]['oauth_code'];
			$oauth->accessToken = $results[0]['access_code'];
			$oauth->updateToken = $results[0]['update_code'];

			$oauth->session = $session;
		}
		return $oauth;
	}
	public static function updateTokens($session, $updateToken, $accessToken)
	{
		$db = DB::getInstance();

		$qStr = "update OAuth set access_token=:at, update_token=:ut where session_id= :session_id";

		$results = $db->query($qStr, array(":at" => $accessToken, ":ut"=> $updateToken, ":session_id" => $session));

	}

}