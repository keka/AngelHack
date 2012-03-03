<?php

$app->get('/meetup/events/:id', function($id) use ($app){

	print "meetup";

	$m = new MeetupEvents();

	// chris '14478923'
	// yifei '6288702'
	$events = $m->getEvents( array( 'member_id' => $id ));


	foreach($events as $e)
	{
		echo $e['name'] . " at " . date(DATE_W3C, $e['time']/1000) . "<br>";
	}

});

$app->get('/meetup/groups/:id', function($id) use ($app){

	$m = new MeetupGroups();

	$groups = $m->getGroups( array( 'member_id' => $id ));

	print "group count: ".count($groups);
	foreach($groups as $g)
	{
		//print_r($g);
		print $g['name'];
		print "<hr>";
	}
});