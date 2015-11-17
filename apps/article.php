<?php
	if ( isset($_GET['id']) ) {
		$idArticle = $_GET['id'];

		$articleQuery = "SELECT * FROM articles WHERE id = $idArticle";
		$authorQuery = "SELECT * FROM users INNER JOIN articles ON users.id = articles.id_author";
		
		$articleResult = mysqli_query($database, $articleQuery);
		$authorResult = mysqli_query($database, $authorQuery);

		$article = mysqli_fetch_assoc($articleResult);
		$author = mysqli_fetch_assoc($authorResult);

		require('views/article.phtml');
	}
?>