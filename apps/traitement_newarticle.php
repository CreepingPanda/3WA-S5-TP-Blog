<?php

	$title = "";
	$content = "";

	if ( isset($_POST['title'], $_POST['content'], $_SESSION['id']) ) {
		$id_author = $_SESSION['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		if ( strlen($title)<=6 && strlen($title)>=127 ) {
			if ( strlen($content)<=140 && strlen($content)>=8191 ) {
				$insert = "INSERT INTO articles (title, content, id_author) VALUES ('$title', '$content', '$id_author')";
				mysqli_query($database, $insert);
				header('Location:index.php');
				exit;
			}else {
				$errors[] = 'L\'article doit contenir entre 140 et 8191 caractères.';
			}
		}else {
			$errors[] = 'Le titre doit contenir entre 6 et 127 caractères.';
		}
	}

?>