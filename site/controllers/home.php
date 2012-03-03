<?php

$app->get('/', function() use ($app){
	$app->view()->display('home.tpl');
});
