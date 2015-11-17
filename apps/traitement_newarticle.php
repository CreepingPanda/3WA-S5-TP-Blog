<?php

	$title = "";
	$content = "";

	if ( isset($_POST['title'], $_POST['content'], $_SESSION['id']) ) {
		$id_author = $_SESSION['id'];
		if ( strlen($_POST['title'])>=6 && strlen($_POST['title'])<=127 ) {
			$title = $_POST['title'];
			if ( strlen($_POST['content'])>=140 && strlen($_POST['content'])<=8191 ) {
				$content = $_POST['content'];
				$insert = "INSERT INTO articles (title, content, id_author) VALUES ('$title', '$content', '$id_author')";
				mysqli_query($database, $insert);
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