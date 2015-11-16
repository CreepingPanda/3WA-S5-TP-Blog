<?php

	$artlistQuery = "SELECT * FROM articles LIMIT 5";
	$artlistResult = mysqli_query($database, $artlistQuery);
	$artlist = mysqli_fetch_assoc($artlistResult);
	require('views/artlist.phtml');
?>