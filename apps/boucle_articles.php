<?php

	while ( $artlist = mysqli_fetch_assoc($artlistResult) ) {
		$id_author = $artlist['id_author'];

		$authorQuery = "SELECT * FROM users WHERE id = $id_author";
		$authorResult = mysqli_query($database, $authorQuery);
		$author = mysqli_fetch_assoc($authorResult);
		
		require('views/boucle_articles.phtml');
	}

?>