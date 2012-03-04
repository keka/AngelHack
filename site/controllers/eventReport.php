<?php

$app->get('/event/:id', function($id) use ($app){

	$app->view()->appendData(array("eventId"=>$id));
	$app->view()->display('event.tpl');
});
