<?php
$content = "";
if (isset($_POST['value'], $_POST['idarticle']))
{
	$value = mysqli_real_escape_string($database, $_POST['value']);
	if (($_POST['value']) <= 0 || ($_POST['value']) >= 5)
	{
		$errors[] = "Incorrect value, must be between 0 and 5";
	}
	if (count($errors) == 0)
	{
		$query = "INSERT INTO notes (id_article, id_user, value) VALUES('".$_POST['idarticle']."', '".$_SESSION['id']."', '".$value."')";
		$resultat = mysqli_query($database, $query);
		if ($resultat)
		{
			header('Location: ?page=article&id='.$_POST['idarticle'].'');
			exit;
		}
		else
		{
			$errors[] = mysqli_error($db);
		}
	}
}
?>