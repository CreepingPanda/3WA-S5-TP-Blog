<?php


$id = 0;


	$id = intval($_GET['id']);

	$queryUsers = "SELECT * FROM users WHERE id='".$id."'";
	$resultUsers = mysqli_query($database, $queryUsers);
	$dataUsers = mysqli_fetch_assoc($resultUsers);

	$queryArticles = "SELECT * FROM articles WHERE id='".$id."'";
	$resultArticles = mysqli_query($database, $queryArticles);
	$dataArticles = mysqli_fetch_assoc($resultArticles);


	$queryCountArticles = "SELECT articles_count FROM users WHERE id='".$id."'";
	$resultCountArticles = mysqli_query($database, $queryCountArticles);
	$dataCountArticles = mysqli_fetch_assoc($resultCountArticles);

	$queryValid = "SELECT validate FROM articles WHERE id_author='".$id."'AND validate=1 ";
	$resultValid = mysqli_query($database, $queryValid);

	$countValid = "SELECT COUNT(articles.id) AS nbr FROM articles WHERE articles.validate=1 AND articles.id_author='".$id."'";
	$resultCountValid = mysqli_query($database, $countValid);
	$dataCountValid = mysqli_fetch_assoc($resultCountValid);

	$countNote = "SELECT id_author, AVG(note) AS moyenne FROM articles WHERE articles.id_author='".$id."'" ;
	$resultCountNote = mysqli_query($database, $countNote);
	$dataCountNote = mysqli_fetch_assoc($resultCountNote);

	
	
	if ($dataCountNote['moyenne'] == null) {
		$dataCountNote['moyenne'] = 'pas de note';
	}

?>

