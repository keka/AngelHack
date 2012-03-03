<?php


$app->get('/meetup/event/:id', function($id) use ($app){


	$m = new MeetupEvents();
	$event = $m->getEvent($id, array()) ;

	print_r($event);

	echo $event['name'] . " at " . $event['venue']['name'];


	/*
	foreach($members as $m)
	{
		print_r($m);
	}
	*/
});

