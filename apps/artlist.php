<?php

	$artlistQuery = "SELECT * FROM articles WHERE validate = true ORDER BY id DESC LIMIT 0, 5";
	$artlistResult = mysqli_query($database, $artlistQuery);
	$artlist = mysqli_fetch_assoc($artlistResult);

	$authorQuery = "SELECT * FROM users WHERE id = '".$artlist['id_author']."'";
	$authorResult = mysqli_query($database, $authorQuery);

	require('views/artlist.phtml');

?>