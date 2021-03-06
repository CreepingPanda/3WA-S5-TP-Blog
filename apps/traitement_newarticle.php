<?php

	$title = "";
	$content = "";
	$image = "";

	if ( isset($_POST['title'], $_POST['content'], $_POST['category'], $_SESSION['id']) ) {
		$id_category = mysqli_real_escape_string($database, $_POST['category']);
		$id_author = mysqli_real_escape_string($database, $_SESSION['id']);
		if ( strlen($_POST['title'])>=6 && strlen($_POST['title'])<=127 ) {
			$title = mysqli_real_escape_string($database, $_POST['title']);
			if ( strlen($_POST['content'])>=140 && strlen($_POST['content'])<=8191 ) {
				$content = mysqli_real_escape_string($database, $_POST['content']);
				// ____ Précalcul de la date
				$jour = date('j');
				$mois = date('M');
				$annee = date('Y');
				$date_post = $jour.' '.$mois.' '.$annee;
				// ____ Préparation de l'ajout d'article
				if ( isset($_POST['image']) && strlen($_POST['image'])<512 ) {
					$image = mysqli_real_escape_string($database, $_POST['image']);
					$insertQuery = "INSERT INTO articles (date_post, title, content, id_author, id_category, image) VALUES ('$date_post', '$title', '$content', '$id_author', '$id_category', '$image')";
				}else {
					$insertQuery = "INSERT INTO articles (date_post, title, content, id_author, id_category) VALUES ('$date_post', '$title', '$content', '$id_author', '$id_category')";
				}

				$selectQuery = "SELECT articles_count FROM users WHERE id = $id_author";
				$selectResult = mysqli_query($database, $selectQuery);
				$select = mysqli_fetch_assoc($selectResult);
				$countQuery = "UPDATE users SET articles_count = '".$select['articles_count']."'+1 WHERE id = $id_author";

				mysqli_query($database, $insertQuery);
				mysqli_query($database, $countQuery);

				header('Location:index.php?page=artlist');
				exit;
			}else {
				$errors[] = 'L\'article doit contenir entre 140 et 8191 caractères.';
			}
		}else {
			$errors[] = 'Le titre doit contenir entre 6 et 127 caractères.';
		}
	}

?>