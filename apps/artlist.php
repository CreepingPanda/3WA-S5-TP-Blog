<?php

	$artlistQuery = "SELECT * FROM articles LIMIT 0, 5";
	$authorQuery = "SELECT * FROM users INNER JOIN articles ON users.id = articles.id_author";

	$artlistResult = mysqli_query($database, $artlistQuery);
	$authorResult = mysqli_query($database, $authorQuery);

	require('views/artlist.phtml');

?>