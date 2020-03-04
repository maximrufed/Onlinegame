<?php
	$res = -1;
	
	$end_game_flag = file_get_contents('isgame.txt');
	if ($end_game_flag == '1') {
		$res = file_get_contents('map.txt');
	}
	
	echo $res;
?>