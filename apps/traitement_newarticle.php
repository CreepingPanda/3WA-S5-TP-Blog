<?php

	$title = "";
	$content = "";
	$image = "";

	if ( isset($_POST['title'], $_POST['content'], $_POST['category'], $_SESSION['id']) ) {
		$id_category = $_POST['category'];
		$id_author = $_SESSION['id'];
		if ( strlen($_POST['title'])>=6 && strlen($_POST['title'])<=127 ) {
			$title = $_POST['title'];
			if ( strlen($_POST['image'])<=511 ) {
				$image = $_POST['image'];
				if ( strlen($_POST['content'])>=140 && strlen($_POST['content'])<=8191 ) {
					$content = $_POST['content'];
					// ____ Précalcul de la date
					$jour = date('j');
					$mois = date('M');
					$annee = date('Y');
					$date_post = $jour.' '.$mois.' '.$annee;
					// ____ Préparation de l'ajout d'article
					$insertQuery = "INSERT INTO articles (date_post, title, content, id_author, id_category, image) VALUES ('$date_post', '$title', '$content', '$id_author', '$id_category', '$image')";
					$selectQuery = "SELECT articles_count FROM users WHERE id = $id_author";

					$selectResult = mysqli_query($database, $selectQuery);
					$select = mysqli_fetch_assoc($selectResult);

					$countQuery = "UPDATE users SET articles_count = '".$select['articles_count']."'+1 WHERE id = $id_author";
					
					mysqli_query($database, $insertQuery);
					mysqli_query($database, $countQuery);
					
					header('Location:index.php?page=artlist');
					exit;
				}else {
					$errors[] = 'Taille limite de l\'url : 511 caractères.';
				}
			}else {
				$errors[] = 'L\'article doit contenir entre 140 et 8191 caractères.';
			}
		}else {
			$errors[] = 'Le titre doit contenir entre 6 et 127 caractères.';
		}
	}

?>