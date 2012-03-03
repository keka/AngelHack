<?php

$app->get('/meetup/user/:id/events/', function($id) use ($app){


	$events = MeetupWrapper::getEventsByUserId($id);

/*
 * Array ( [status] => upcoming [visibility] => public [maybe_rsvp_count] => 0 [venue] => Array ( [id] => 1784461 [zip] => 10010 [lon] => -73.989395 [name] => General Assembly [state] => NY [address_1] => 902 Broadway, New York, NY, 10010 [lat] => 40.742363 [city] => New York [country] => us )
 * 				[id] => 54203402 [utc_offset] => -18000000 [time] => 1330876800000 [yes_rsvp_count] => 2 [event_url] => http://www.meetup.com/The-Stamford-Tech-Meetup/events/54203402/ [description] =>

 */
	$resp = array();
	$resp['userId'] = $id;

	$eventData = array();

	if(count($events) == 0)
		return;
	foreach($events as $e)
	{
		$newEvent = array();
		$newEvent['id'] = $e['id'];
		$newEvent['status'] = $e['status'];
		$newEvent['url'] = $e['event_url'];
		$newEvent['yes_rsvp_count'] = $e['yes_rsvp_count'];
		$newEvent['maybe_rsvp_count'] = $e['maybe_rsvp_count'];
		$newEvent['date'] = date(DATE_W3C, $e['time']/1000);
		$newEvent['venue'] = $e['venue'];
		$newEvent['name'] = $e['name'];
		$newEvent['self'] = $e['self'];

		$eventData[] = $newEvent;

		//print_r($e);
		//echo $e['id']."   : ".$e['name'] . " at " . date(DATE_W3C, $e['time']/1000) . "<br>";
	}
	$resp['events'] =$eventData;
	print json_encode($resp);

	return;

	/*
	if(count($events) > 0)
	{
		foreach($events as $e)
		{
			//print_r($e);
			echo $e['id']."   : ".$e['name'] . " at " . date(DATE_W3C, $e['time']/1000) . "<br>";
		}
	}
	else
	{
		print "no results";
	}
	*/


});

$app->get('/meetup/user/:id/groups/', function($id) use ($app){

	$m = new MeetupGroups();

	$groups = $m->getGroups( array( 'member_id' => $id ));

	print "group count: ".count($groups);
	if(count($groups))
	{
		foreach($groups as $g)
		{
			print "<br>";
			print_r($g);
			print "<br>";
			print $g['name'];
			print "<br>";
			print $g['id'];
			print "<hr>";
		}
	}
	else
	{
		print "no data";
	}
});

