<?php

// $_GET['p']=3
// $_GET['action']='consulter'
// $action = isset($_GET['action'])?htmlspecialchars($_GET['action']):'consulter';
// $membre = isset($_GET['p'])?(int) $_GET['p']:'';

$id = 0;

if (isset($_SESSION['id']))
{
	$id = $_SESSION['id'];
}
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




?>

