<?php

require_once("../bootstrap.php");
require_once('../lib/meetup/Meetup.php');
//add Renderable Routes
foreach (glob("../site/controllers/*.php") as $filename)
{
	include $filename;
}


$app->run();