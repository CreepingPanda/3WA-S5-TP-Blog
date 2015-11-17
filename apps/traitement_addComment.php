<?php
$content = "";
if (isset($_POST['content']))
{
	$content = mysqli_real_escape_string($database, $_POST['content']);
	if (strlen($_POST['content']) < 1 || strlen($_POST['content']) > 2048)
	{
		$errors[] = "Incorrect content, must be between 2 and 2048 characters";
	}
	if (count($errors) == 0)
	{
		$query = "INSERT INTO comments (id_article, id_user, content) VALUES('".$_POST['idarticle']."', '".$_SESSION['id']."', '".$content."')";
		$resultat = mysqli_query($database, $query);
		if ($resultat)
		{
			header('Location: ?page=article'); 
			exit;
		}
		else
		{
			$errors[] = mysqli_error($db);
		}
	}
}
?>