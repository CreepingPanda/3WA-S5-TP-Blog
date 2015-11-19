<?php

	if ( isset($_SESSION['id'], $_GET['id']) ) {
		$idArticle = $_GET['id'];

		$articleQuery = "SELECT * FROM articles WHERE id = $idArticle";
		$authorQuery = "SELECT * FROM users INNER JOIN articles ON users.id = articles.id_author";
		
		$articleResult = mysqli_query($database, $articleQuery);
		$authorResult = mysqli_query($database, $authorQuery);

		$article = mysqli_fetch_assoc($articleResult);
		$author = mysqli_fetch_assoc($authorResult);

		$categoryQuery = "SELECT * FROM category WHERE id = '".$article['id_category']."'";
		$categoryResult = mysqli_query($database, $categoryQuery);
		$category = mysqli_fetch_assoc($categoryResult);

		$id = intval($_GET['id']);
		$editQuery = "SELECT id_author FROM articles WHERE id = $id";
		$editResult = mysqli_query($database, $editQuery);
		$editAssoc = mysqli_fetch_assoc($editResult);
		$edit = $editAssoc['id_author'];

		if ( $edit == $_SESSION['id'] ) {
			require('views/article_edit.phtml');
		}
	}else {
		header('Location:index.php');
		exit;
	}

?>