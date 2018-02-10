<?php
include("m.php");
require('mpd.class.php');
$mpd = new MPD($host, $port, $password);
if(isset($_GET['play'])){
	$mpd->play_id(filter_input(INPUT_GET,'play'));
}
if(isset($_GET['vol'])){
	if(filter_input(INPUT_GET,'vol') == 'plus'){
		$mpd->adjust_vol(+10);
	}
	if(filter_input(INPUT_GET,'vol') == 'min'){
		$mpd->adjust_vol(-10);
	}
}
if(isset($_GET['stop'])){
	$mpd->stop();
}

if(isset($_GET['add'])){
	$mpd->playlist_add(filter_input(INPUT_GET,'add'));
	header('Location: index.php');
}
