<?php

	if ( isset($_GET['id']) ) {
		$id = intval($_GET['id']);
		$editQuery = "SELECT id_author FROM articles WHERE id = $id";
		$editResult = mysqli_query($database, $editQuery);
		$editAssoc = mysqli_fetch_assoc($editResult);
		$edit = $editAssoc['id_author'];

		if ( $edit == $_SESSION['id'] && isset($_POST['title'], $_POST['content']) ) {

			if ( strlen($_POST['title'])>=6 && strlen($_POST['title'])<=127 ) {
				$title = mysqli_real_escape_string($database, $_POST['title']);

				if ( strlen($_POST['content'])>=140 && strlen($_POST['content'])<=8191 ) {
					$content = mysqli_real_escape_string($database, $_POST['content']);
					$updateQuery = "UPDATE articles SET title = '$title', content = '$content' WHERE id = $id";
					mysqli_query($database, $updateQuery);

					header('Location:index.php?page=artlist');
					exit;

				}else {
					$errors[] = "Le titre doit contenir entre 6 et 140 caractères.";
				}
			}else {
				$errors[] = "L'article doit contenir entre 140 et 8191 caractères.";
			}
		}
	}

?>