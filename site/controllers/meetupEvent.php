<?php


$app->get('/meetup/event/:id', function($id) use ($app){


	$event = MeetupWrapper::getEventInfoById($id);

	print json_encode($event);
	/*
	foreach($members as $m)
	{
		print_r($m);
	}
	*/
});

$app->get('/meetup/event/:id/rsvps', function($id) use ($app){


	$rsvps = MeetupWrapper::getRsvpsByEventId($id);

	print json_encode($rsvps);
	/*
	foreach($rsvps as $m)
	{
	print_r($m);
	}
	*/
});

