<?php
if (isset($_POST['value'], $_POST['idarticle'], $_SESSION['id']))
{
	$idArticle = $_POST['idarticle'];
	$idSession = $_SESSION['id'];
	$value = intval($_POST['value']);

	if ($value < 0 || $value > 5)
	{
		$errors[] = "Incorrect value, must be between 0 and 5";
	}
	if (count($errors) == 0)
	{
		$query = "INSERT INTO notes (id_article, id_user, value) VALUES('".$idArticle."', '".$idSession."', '".$value."')";
		$resultat = mysqli_query($database, $query);
		if ($resultat)
		{
			header("Location: ?page=article&id=".$idArticle); 
			exit;
		}
		else
		{
			$errors[] = mysqli_error($db);
		}
	}
}else {
	header('Location: ?page=home');
	exit;
}
?>