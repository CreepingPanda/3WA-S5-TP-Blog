<?php
	session_start();

	$database = mysqli_connect('192.168.1.26', 'shadowblog', 'shadowblog', 'shadowblog');
	if ( $database == false )
		{ die(mysqli_connect_error()); }

	$ways = array();
	$traitements = array();

	$traitementsAdmin = array();

	$page = 'home';
	$errors = array();

	if ( isset($_GET['page']) ) {
		if ( in_array($_GET['page'], $traitements) ) {
			require('apps/traitement_'.$_GET['page'].'.php');
		}
		else if ( isset($_SESSION['id']) && $_SESSION['rights'] == 2 ) {
			require('apps/traitement_'.$_GET['page'].'.php');
		}
		if ( in_array($_GET['page'], $ways) ) {
			$page = $_GET['page'];
		}
	}

	require('apps/skel.php');
?>