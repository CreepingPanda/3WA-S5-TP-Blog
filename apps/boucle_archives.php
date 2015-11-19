<?php

	while ( $archives = mysqli_fetch_assoc($archivesResult) ) {
		$id_author = $archives['id_author'];

		$authorQuery = "SELECT * FROM users WHERE id = $id_author";
		$authorResult = mysqli_query($database, $authorQuery);
		$author = mysqli_fetch_assoc($authorResult);
		
		require('views/boucle_archives.phtml');
	}

?>