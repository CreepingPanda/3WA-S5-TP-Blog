<?php

	$title = "";
	$content = "";
	$id_author = $_SESSION['id'];
	$insert = 'INSERT INTO articles (title, content, id_author) VALUES ('$title', '$content', '$id_author')';

	if ( isset($_POST['title'], $_POST['content']) && $_SESSION['id'] ) {
		$title = $_POST['title'];
		$content = $_POST['content'];
		if ( strlen($title)<=6 && strlen($title)>=127 ) {
			if ( strlen($content)<=140 && strlen($content)>=8191 ) {
				mysqli_query($database, $insert);
				header('Location:index.php');
			}else {
				$errors = ['L\'article doit contenir entre 140 et 8191 caractères.'];
			}
		}else {
			$errors = ['Le titre doit contenir entre 6 et 127 caractères.'];
		}
	}

?>