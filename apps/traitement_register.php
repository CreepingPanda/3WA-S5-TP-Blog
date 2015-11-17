<?php
$nom ="";
$prenom="";
$login = "";
$email= "";
$password = "";
$password2 = "";
if (isset($_POST['login'], $_POST['password'], $_POST['password2'], $_POST['email'], $_POST['nom'], $_POST['prenom']))
{
	$login = $_POST['login'];
	$email = $_POST['email'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if ($password != $password2)
	{
		$errors[] = "Les mots de passe ne correspondent pas";
	}

	else if (strlen($password) < 6)
	{
		$errors[] = "Mot de passe trop court";
	}
	if (strlen($login) < 4)
	{
		$errors[] = "Login trop court";
		if (strlen($nom) < 2)
	{
		$errors[] = "Nom trop court";
	}
	if (strlen($prenom) < 2)
	{
		$errors[] = "Prénom trop court";
	}
	}
	if (count($errors) == 0)
	{
		$hash = password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost"=>10));
		$query = "INSERT INTO users (login, nom, prenom, email, password) VALUES('$login', '$nom', '$prenom', '$email', '$hash')";
		$resultat = mysqli_query($database, $query);

		header('Location: index.php?page=login');
		exit;
	}

}
?>