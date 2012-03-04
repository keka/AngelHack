<?php

class MeetupWrapper
{
	public static function getEventsByUserId($userId)
	{
		$m = new MeetupEvents();

		// chris '14478923'
		// yifei '6288702'
		$events = $m->getEvents( array( 'member_id' => $userId, 'fields' => 'self'));

		$resp = array();
		$resp['userId'] = $userId;

		$eventData = array();

		if(count($events) == 0)
		return;
		foreach($events as $e)
		{
			if($e['yes_rsvp_count'] < 5)
			continue;
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
		return $resp;

	}

	public static function getMembersByGroupId($groupId)
	{



	}
	public static function getRsvpsByEventId($eventId)
	{
		$m = new MeetupRsvps();

		// chris '14478923'
		// yifei '6288702'
		$rsvps = $m->getRsvps( array( 'event_id' => $eventId));

		return $rsvps;

	}

	public static function getUserInfoId($userId)
	{
		$m = new MeetupMembers();

		// chris '14478923'
		// yifei '6288702'
		$info = $m->getMember( array( 'user_id' => $userId));

		return $info;

	}

	public static function getEventInfoById($eventId)
	{
		$m = new MeetupEvents();
		$event = $m->getEvent($eventId, array()) ;


		//echo $event['name'] . " at " . $event['venue']['name'];


		$resp = array();
		$resp['event'] = $event;

		return $resp;

	}




}