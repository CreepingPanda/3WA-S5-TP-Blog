<?php
$loginTarget = "";
$content = "";
if (isset($_POST['content'], $_POST['loginTarget'], $_SESSION['id']))
{
	$content = mysqli_real_escape_string($database, $_POST['content']);
	$loginTarget = mysqli_real_escape_string($database, $_POST['loginTarget']);
	if (strlen($_POST['content']) < 1 || strlen($_POST['content']) > 2048)
	{
		$errors[] = "Incorrect content, must be between 2 and 2048 characters";
	}
	$query = "SELECT * FROM users WHERE login='".$loginTarget."'" ;
	$resultatTarget = mysqli_query($database, $query);
	$target = mysqli_fetch_assoc($resultatTarget);
	if (!$target)
	{
		$errors[] = "login non existant";
	}
	if (count($errors) == 0)
	{
		var_dump($target);
		var_dump($content);
		$query = "INSERT INTO p_messages (id_writer, id_reader, content) VALUES('".$_SESSION['id']."', '".$target['id']."', '".$content."')";
		$resultat = mysqli_query($database, $query);
		if ($resultat)
		{
			header('Location: ?page=mp'); 
			exit;
		}
		else
		{
			$errors[] = mysqli_error($database);
		}
	}
}
?>