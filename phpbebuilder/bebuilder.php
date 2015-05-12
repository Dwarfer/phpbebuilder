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

require 'config.inc.php';

foreach ($files as $x => $f ){
	echo "Building $f" . $EOL;
	$basefile = BuildArrays($BASE_DIR . "/" . $f);
	if($basefile){
		if (file_exists($DIFF_DIR . "/" . $f)) {
			//Lets build the new file
			$difffile = BuildArrays($DIFF_DIR . "/" . $f);
			if($difffile){
				echo "\tMerging the diffs writing $f" . $EOL;
				$merge = MergeFilters($basefile,$difffile);
				if($merge){
					WriteTheNewFile($NEW_DIR . "/" . $f, $merge);
				}else{
					//Catch just incase it failes on merge
					WriteTheNewFile($NEW_DIR . "/" . $f, $basefile);
				}
			}else{
				echo "\t$f is empty building default {$f}" . $EOL;
				WriteTheNewFile($NEW_DIR . "/" . $f, $basefile);
			}
		}else{
			//Lets just write the default file
			echo "\tWriting default {$f}" . $EOL;
			WriteTheNewFile($NEW_DIR . "/" . $f, $basefile);
		}
	}
}

function WriteTheNewFile($newfile,$data){
	global $EOL;
	$file = fopen($newfile, 'w');
	$content = "";
	if($file){
		foreach($data as $a => $b){
			if($b['value']){
				$content .= "{$b['level']} {$a} {$b['value']}" . $EOL;
			}else{
				$content .= "{$b['level']} {$a}" . $EOL;
			}
		}
		fputs($file, $content);
		fclose($file);
	}
	return;
}

function MergeFilters($base,$diff){
	$new = array();
	foreach ($base as $a => $b){
		//Ok lets now add the diffs
		if(isset($diff[$a])){
			if($b['level'] != $diff[$a]['level']){
				$new[$a]['level'] = $diff[$a]['level'];
			}else{
				$new[$a]['level'] = $b['level'];
			}
			$new[$a]['value'] = $b['value'] . " " . $diff[$a]['value'];
		}else{
			$new[$a]['level'] = $b['level'];
			$new[$a]['value'] = $b['value'];
		}
	}
	return($new);
}

function BuildArrays($filename){
	$file = file($filename,  FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	if (!$file){ 
		return false;
	}
	$result = [];
	foreach ($file as $line_num => $line) {
		$exploded = explode(" ",$line,3);
		$result[$exploded[1]]['level'] = $exploded[0];
		if(isset($exploded[2]))
			$result[$exploded[1]]['value'] = $exploded[2];
		else
			$result[$exploded[1]]['value'] = NULL;
	}
	return $result;
}

?>