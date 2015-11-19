<?php

if (isset($_POST['value'], $_POST['idarticle'], $_SESSION['id']))
{
	$idArticle = $_POST['idarticle'];
	$idSession = $_SESSION['id'];
	$value = mysqli_real_escape_string($database, $_POST['value']);

	if (($_POST['value']) < 0 || ($_POST['value']) > 5)
	{
		$errors[] = "Incorrect value, must be between 0 and 5";
	}
	if (count($errors) == 0)
	{
		$query = "INSERT INTO notes (id_article, id_user, value) VALUES('$idArticle', '$idSession', '$value')";
		mysqli_query($database, $query);

		if ($resultat)
		{
			header("Location: ?page=article&id='$idArticle'"); 
			exit;
		}
		else
		{
			$errors[] = mysqli_error($db);
		}
	}
}
?>