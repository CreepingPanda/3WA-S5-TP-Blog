<?php
	if ( isset($_GET['id']) ) {
		$idArticle = intval($_GET['id']);

		// ____ Array article
		$articleQuery = "SELECT * FROM articles WHERE id = $idArticle";
		$articleResult = mysqli_query($database, $articleQuery);
		$article = mysqli_fetch_assoc($articleResult);
		
		// ____ Array auteur
		$authorQuery = "SELECT * FROM users WHERE id = '".$article['id_author']."'";
		$authorResult = mysqli_query($database, $authorQuery);
		$author = mysqli_fetch_assoc($authorResult);

		// ____ Array catégorie
		$categoryQuery = "SELECT * FROM category WHERE id = '".$article['id_category']."'";
		$categoryResult = mysqli_query($database, $categoryQuery);
		$category = mysqli_fetch_assoc($categoryResult);

		// ____ Requête notes
		$notesQuery = "SELECT * FROM notes WHERE id_article = '".$article['id']."'";
		$notesResult = mysqli_query($database, $notesQuery);
		$notes = mysqli_fetch_assoc($notesResult);

		// ____ Calcul note moyenne
		if ( $notes ) {
			$total = 0;
			$i = 0;
			while ( $notes = mysqli_fetch_assoc($notesResult) ) {
				$total = $total + $notes['value'];
				$i++;
			}
			$moyenne = $total / $i;

			// ____ Update note moyenne
			if ( $article['note'] != $moyenne ) {
				$updateNoteQuery = "UPDATE articles SET note = '".$moyenne."'";
				mysqli_query($database, $updateNoteQuery);
			}
		}

		require('views/article.phtml');
	}
?>