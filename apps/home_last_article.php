<?php

	$lastArticleQuery = "SELECT * FROM articles ORDER BY id DESC LIMIT 0, 1";
	$lastArticleResult = mysqli_query($database, $lastArticleQuery);
	$lastArticle = mysqli_fetch_assoc($lastArticleResult);

	require('views/home_last_article.phtml');

?>