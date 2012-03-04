<?php

$app->get('/authed', function() use ($app){


	print_r($app->request()->get());
	//print_r($app->request()->post());
	$code = $app->request()->get("code");

	$oAuth = MeetupOAuth::create($code);

	print_r($oAuth);

});
