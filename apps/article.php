<?php
	if ( isset($_GET['id']) ) {
		$idArticle = $_GET['id'];
		$query = "SELECT * FROM articles WHERE id = $idArticle";
		$result = mysqli_query($database, $query);
		$article = mysqli_fetch_assoc($result);
		require('views/article.phtml');
	}
?>