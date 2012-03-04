<?php

$app->get('/authed', function() use ($app){


	print_r($app->request()->get());
	//print_r($app->request()->post());
	$code = $app->request()->get("code");
	$session = session_id();
	$oAuth = MeetupOAuth::create($code, $session);

	print_r($oAuth);

});

$app->get('/authedNext', function() use ($app,$config){

	$session = session_id();
	$oAuth = MeetupOAuth::getBySessionId($session);
	if(!isset($oAuth))
		print "nada";

	print_r($oAuth);
	print "<br><br>";
	$tokens = MeetupOAuthWrapper::getToken($config['OAUTH_KEY'],$config['OAUTH_SECRET'],$config['OAUTH_REDIR'],$oAuth->code);
	print_r($tokens);
	var_dump($tokens);
	print "<br><br>";
	if(isset($tokens->access_token))
	{
		print $tokens->refresh_token;
		MeetupOAuth::updateTokens($session, $tokens->refresh_token, $tokens->access_token);
	}
	else
	{
		print "error";
	}


});