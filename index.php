<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();

	$database = mysqli_connect('192.168.1.26', 'shadowblog', 'shadowblog', 'shadowblog');
	if ( $database == false ) {
		die(mysqli_connect_error());
	}

<<<<<<< HEAD
	$ways = array('home', 'article', 'artlist', 'login', 'mp', 'newmp', 'newarticle', 'profil', 'register', 'userlist', 'edit_profil');
	$traitements = array('newarticle', 'login', 'mp', 'logout', 'newcomment', 'newmp', 'register', 'profil', 'edit_profil');
=======
	$ways = array('home', 'article', 'artlist', 'login', 'mp', 'newmp', 'newarticle', 'profil', 'register', 'userlist', 'archives');
	$traitements = array('newarticle', 'login', 'mp', 'logout', 'addComment', 'newmp', 'register', 'note');
>>>>>>> ad78870912ed80425f939a41185ebb6572648bdd

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