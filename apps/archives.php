<?php

	$archivesQuery = "SELECT * FROM articles WHERE validate = true ORDER BY id DESC";
	$archivesResult = mysqli_query($database, $archivesQuery);

	require('views/archives.phtml');

?>