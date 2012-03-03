<?php

class MeetupWrapper
{
	public static function getEventsByUserId($userId)
	{
		$m = new MeetupEvents();

		// chris '14478923'
		// yifei '6288702'
		$events = $m->getEvents( array( 'member_id' => $userId, 'fields' => 'self'));

		return $events;

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





}