<?php

	$artlistQuery = "SELECT * FROM articles WHERE validate = true ORDER BY id DESC LIMIT 0, 5";
	$artlistResult = mysqli_query($database, $artlistQuery);

	require('views/artlist.phtml');

?>