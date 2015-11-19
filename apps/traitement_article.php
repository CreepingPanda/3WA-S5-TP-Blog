<?php
	if ( isset($_SESSION['id']) && $_SESSION['rights']==2 )
	{
		if ( isset($_POST['delete']) && $_POST['delete']=="SUPPRIMER")
		{
			$deleteQuery = "DELETE FROM articles WHERE id = '".intval($_GET['id'])."'";
			mysqli_query($database, $deleteQuery);

			header('Location:index.php?page=artlist');
			exit;
		}
	}
?>