<?php
	session_start();

	$database = mysqli_connect('192.168.1.26', 'shadowblog', 'shadowblog', 'shadowblog');
	if ( $database == false ) {
		die(mysqli_connect_error());
	}

	$ways = array('home', 'article', 'artlist', 'login', 'mp', 'newmp', 'newarticle', 'profil', 'register', 'userlist', 'archives');
	$traitements = array('newarticle', 'login', 'mp', 'logout', 'addComment', 'newmp', 'register');

	$traitementsAdmin = array();

	$page = 'home';
	$errors = array();

	if ( isset($_GET['page']) ) {
		if ( in_array($_GET['page'], $traitements) ) {
			require('apps/traitement_'.$_GET['page'].'.php');
		}
		else if ( isset($_SESSION['id']) && $_SESSION['rights'] == 2 ) {
			if ( in_array($_GET['page'], $traitementsAdmin) ) {
				require('apps/traitement_'.$_GET['page'].'.php');
			}
		}
		if ( in_array($_GET['page'], $ways) ) {
			$page = $_GET['page'];
		}
	}

	require('apps/skel.php');
?>