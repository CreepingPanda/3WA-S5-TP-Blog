<?php

	$archivesQuery = "SELECT * FROM articles";
	$authorQuery = "SELECT * FROM users INNER JOIN articles ON users.id = articles.id_author";

	$archivesResult = mysqli_query($database, $archivesQuery);
	$authorResult = mysqli_query($database, $authorQuery);

	require('views/archives.phtml');

?>