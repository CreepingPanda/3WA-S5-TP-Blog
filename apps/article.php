<?php
	if ( isset($_GET['id']) ) {
		$idArticle = $_GET['id'];

		$articleQuery = "SELECT * FROM articles WHERE id = $idArticle";
		$authorQuery = "SELECT * FROM users INNER JOIN articles ON users.id = articles.id_author";
		$categoryQuery = "SELECT * FROM category LEFT JOIN articles ON category.id = articles.id_category";
		
		$articleResult = mysqli_query($database, $articleQuery);
		$authorResult = mysqli_query($database, $authorQuery);
		$categoryResult = mysqli_query($database, $categoryQuery);

		$article = mysqli_fetch_assoc($articleResult);
		$author = mysqli_fetch_assoc($authorResult);
		$category = mysqli_fetch_assoc($categoryResult);

		require('views/article.phtml');
	}
?>