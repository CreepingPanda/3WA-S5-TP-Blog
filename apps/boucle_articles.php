<?php

	while ( $artlist = mysqli_fetch_assoc($artlistResult) ) {
		$author = mysqli_fetch_assoc($authorResult);
		require('views/boucle_articles.phtml');
	}

?>