<?php

	$lastArticleQuery = "SELECT * FROM articles WHERE validate = 1 ORDER BY id DESC LIMIT 0, 2";
	$lastArticleResult = mysqli_query($database, $lastArticleQuery);

	while ( $lastArticle = mysqli_fetch_assoc($lastArticleResult) ) {
		

	$authorQuery = "SELECT * FROM users WHERE id = '".$lastArticle['id_author']."'";
	$authorResult = mysqli_query($database, $authorQuery);
	// ____ Auteur de l'article ____
	$author = mysqli_fetch_assoc($authorResult);

	$categoryQuery = "SELECT * FROM category WHERE id = '".$lastArticle['id_category']."'";
	$categoryResult = mysqli_query($database, $categoryQuery);
	// ____ Catégorie de l'article
	$category = mysqli_fetch_assoc($categoryResult);

		
			require('views/home_last_article.phtml');
	}



?>