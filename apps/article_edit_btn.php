<?php
	if ( isset($_SESSION['id']) ) {
		$id = intval($_GET['id']);
		$editQuery = "SELECT id_author FROM articles WHERE id = $id";
		$editResult = mysqli_query($database, $editQuery);
		$editAssoc = mysqli_fetch_assoc($editResult);
		$edit = $editAssoc['id_author'];

		if ( $edit == $_SESSION['id'] || $_SESSION['rights']==2 ) {
			require('views/article_edit_btn.phtml');
		}
	}
?>