<?php
	if ( isset($_GET['id']) ) {
		$idArticle = $_GET['id'];
		$select = "SELECT * FROM articles WHERE id = $idArticle";
		$authorQuery = "SELECT * FROM users INNER JOIN articles ON users.id = articles.id_author";

		$result = mysqli_query($database, $select);
		$authorResult = mysqli_query($database, $authorQuery);

		$article = mysqli_fetch_assoc($result);
		$author = mysqli_fetch_assoc($authorResult);

		require('views/article.phtml');
	}
?>