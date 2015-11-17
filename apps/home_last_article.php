<?php

	$lastArticleQuery = "SELECT * FROM articles WHERE validate = 1 ORDER BY id DESC LIMIT 0, 1";
	$lastArticleResult = mysqli_query($database, $lastArticleQuery);
	// ____ Dernier article validé ____
	$lastArticle = mysqli_fetch_assoc($lastArticleResult);

	$authorQuery = "SELECT * FROM users WHERE id = '".$lastArticle['id_author']."'";
	$authorResult = mysqli_query($database, $authorQuery);
	// ____ Auteur de l'article ____
	$author = mysqli_fetch_assoc($authorResult);

	require('views/home_last_article.phtml');

?>