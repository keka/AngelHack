<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'lib/Slim/Slim.php';

require_once('lib/resource/db.php');
require_once('lib/angelhack/SmartyView.php');

require_once('lib/meetup/Meetup.php');
require_once('lib/angelhack/MeetupWrapper.php');
require_once('lib/angelhack/MeetupOAuth.php');
$app = new Slim(array(
		'view' => 'SmartyView',
		'session.handler' => null
));


?>