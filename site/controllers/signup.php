<?php

$app->get('/signup', function() use ($app){


	$url = "https://secure.meetup.com/oauth2/authorize?client_id=ug3mkum38il22d9qdojf00a4pr&response_type=code&redirect_uri=swftlr.com/authed";

	$app->redirect($url);

});
