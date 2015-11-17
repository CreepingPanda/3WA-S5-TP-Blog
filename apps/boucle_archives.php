<?php

	while ( $archives = mysqli_fetch_assoc($archivesResult) ) {
		$author = mysqli_fetch_assoc($authorResult);
		require('views/boucle_archives.phtml');
	}

?>