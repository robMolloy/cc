<?php
		
// Turn off error reporting
error_reporting(1);
error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

//~ session must start before any other code is run
session_start();

//~ changes mode to developer mode
global $dev;
global $debug;
global $projectLabel;
global $projectName;

$dev = True;
$debug = False;
$projectLabel = 'Convict Conditioning';
$projectName = 'cc';

?>
