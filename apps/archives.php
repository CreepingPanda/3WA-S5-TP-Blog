<?php

	$archivesQuery = "SELECT * FROM articles WHERE validate = true ORDER BY id DESC";
	$archivesResult = mysqli_query($database, $archivesQuery);
	$archives = mysqli_fetch_assoc($archivesResult);

	$authorQuery = "SELECT * FROM users WHERE id = '".$archives['id_author']."'";
	$authorResult = mysqli_query($database, $authorQuery);

	require('views/archives.phtml');

?>