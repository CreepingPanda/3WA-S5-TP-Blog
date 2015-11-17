<?php

	$artlistQuery = "SELECT * FROM articles LIMIT 5";
	$artlistResult = mysqli_query($database, $artlistQuery);
	require('views/artlist.phtml');

?>