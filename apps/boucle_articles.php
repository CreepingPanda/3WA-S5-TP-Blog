<?php

	while ( $artlist = mysqli_fetch_assoc($artlistResult) ) {
		require('views/boucle_articles.phtml');
	}

?>