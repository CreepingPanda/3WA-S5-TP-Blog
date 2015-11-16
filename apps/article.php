<?php
	if ( isset($_GET['id']) ) {
		$idArticle = $_GET['id'];
		$select = "SELECT * FROM articles WHERE id = $idArticle";
		$result = mysqli_query($database, $select);
		$article = mysqli_fetch_assoc($result);

		require('views/article.phtml');
	}
?>