<?php

require_once("../bootstrap.php");

//add Renderable Routes
foreach (glob("../site/controllers/*.php") as $filename)
{
	include $filename;
}


$app->run();