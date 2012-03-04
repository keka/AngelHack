<?php
require_once('../lib/resource/db.php');

require_once('../lib/meetup/Meetup.php');
require_once('../lib/angelhack/MeetupWrapper.php');
require_once('../lib/angelhack/MeetupOAuth.php');

function processEvent($event)
{
	print $event['name']."\n";
}

function getEvents($userId)
{
	//$data = RawEvent::get($userId);

	//if(!isset($data))

	$events = MeetupWrapper::getEventsByUserId($userId);
	return $events;
	//}
/*
	return json_decode($data);

	RawEvent::set($events['user'], json_encode($events));
	*/
}

print "processing event";
$id = "14478923";

$events = getEvents($id);
var_dump($events);
foreach($events['events'] as $event)
{

	processEvent($event);
	break;

}
/*
 *
 * Get list of events
 *
 *
 * Get people for that event
 * process person
 *
 *
 */




print "\n";
print "\n";
