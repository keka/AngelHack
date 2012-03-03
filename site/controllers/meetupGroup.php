<?php


$app->get('/meetup/group/:id/members/', function($id) use ($app){


	$m = new MeetupMembers();

	$members = $m->getMembers( array( 'group_id' => $id ));

	print_r($members);
	/*
	foreach($members as $m)
	{
		print_r($m);
	}
	*/
});

