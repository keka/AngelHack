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





}