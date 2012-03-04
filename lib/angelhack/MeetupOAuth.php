<?php




class MeetupOAuthWrapper
{

	public static function getToken($key,$secret, $redir, $code)
	{
		print "key: ".$key."<br><br>";
		print "secret: ".$secret."<br><br>";
		print "redir: ".$redir."<br><br>";
		print "code: ".$code."<br><br>";


		$url = 'https://secure.meetup.com/oauth2/access';

		$data = 'client_id='.$key.'&client_secret='.$secret.'&grant_type=authorization_code&redirect_uri='.$redir.'&code='.$code;


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded'));
		//curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		/*
		$data = array(
		    'client_id' => 'foo foo foo',
		    'client_secret' => 'bar bar bar',
		    'baz' => 'baz baz baz'
		);
	*/
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);
		//print_r($output);
		//print_r($info);

		return json_decode($output);


	}




}
