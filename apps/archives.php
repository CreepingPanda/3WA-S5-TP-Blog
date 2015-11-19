<?php

	$archivesQuery = "SELECT * FROM articles WHERE validate = true ORDER BY id DESC";
	$archivesResult = mysqli_query($database, $archivesQuery);

	$authorQuery = "SELECT * FROM users LEFT JOIN articles ON users.id = articles.id_author";
	$authorResult = mysqli_query($database, $authorQuery);

	require('views/archives.phtml');

?>