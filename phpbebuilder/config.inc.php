<?php
/*
	EpochMod - PHP Battleye Parser
	http://www.deadmenrising.net/
	https://github.com/Dwarfer/phpbebuilder
	By Dwarfer
	
	$EOL - Sets the End of Line Type, Leave as PHP_EOL for auto detect on OS else \n for Linux \r\n for Win

	Make sure none of these have / at the end
	$BASE_DIR - Can be a file path or URL to the base filters
	$DIFF_DIR - specify the directory for the diff files
	$NEW_DIF - this is where you want the output files to be writen
*/

$EOL = PHP_EOL;
//$EOL = "\r\n";
//$EOL = "\n";

$BASE_DIR = "https://raw.githubusercontent.com/EpochModTeam/Epoch/master/Server_Install_Pack/sc/battleye";
$DIFF_DIR = "diff";
$NEW_DIR = "new";

//List of the filters
$files[] = 'addbackpackcargo.txt';
$files[] = 'addmagazinecargo.txt';
$files[] = 'addweaponcargo.txt';
$files[] = 'attachto.txt';
$files[] = 'createvehicle.txt';
$files[] = 'deleteVehicle.txt';
$files[] = 'mpeventhandler.txt';
$files[] = 'publicvariable.txt';
$files[] = 'publicvariableval.txt';
$files[] = 'remotecontrol.txt';
$files[] = 'remoteexec.txt';
$files[] = 'scripts.txt';
$files[] = 'selectplayer.txt';
$files[] = 'setdamage.txt';
$files[] = 'setpos.txt';
$files[] = 'setvariable.txt';
$files[] = 'setvariableval.txt';
$files[] = 'teamswitch.txt';
$files[] = 'waypointcondition.txt';
$files[] = 'waypointstatement.txt';

?>