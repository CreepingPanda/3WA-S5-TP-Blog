<?php
	if ( isset($_GET['id']) ) {
		$idArticle = $_GET['id'];

		$articleQuery = "SELECT * FROM articles WHERE id = $idArticle";
		$articleResult = mysqli_query($database, $articleQuery);
		$article = mysqli_fetch_assoc($articleResult);
		
		$authorQuery = "SELECT * FROM users WHERE id = '".$article['id_author']."'";
		$authorResult = mysqli_query($database, $authorQuery);
		$author = mysqli_fetch_assoc($authorResult);

		$categoryQuery = "SELECT * FROM category WHERE id = '".$article['id_category']."'";
		$categoryResult = mysqli_query($database, $categoryQuery);
		$category = mysqli_fetch_assoc($categoryResult);

		require('views/article.phtml');
	}
?>