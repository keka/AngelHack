<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'lib/Slim/Slim.php';
require_once('lib/angelhack/SmartyView.php');


$app = new Slim(array('view' => 'SmartyView'));


?>