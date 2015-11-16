<?php
$login = "";
$nom ="";
$prenom="";
$email="";
$password = "";
$password2 = "";
if (isset($_POST['login'], $_POST['password'], $_POST['password2'], $_POST['email'], $_POST['nom'], $_POST['prenom']))
{
	$login = $_POST['login'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if ($password != $password2)
	{
		$errors[] = "Password don't match";
	}

	else if (strlen($password) < 6)
	{
		$errors[] = "Password too short";
	}
	if (strlen($login) < 4)
	{
		$errors[] = "Login too short";
	}
	if (strlen($nom) < 2)
	{
		$errors[] = "Nom too short";
	}
	if (strlen($prenom) < 2)
	{
		$errors[] = "Prénom too short";
	}
	if (count($errors) == 0)
	{
		$hash = password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost"=>10));
		$query = "INSERT INTO user (login, nom, prenom, email, password) VALUES('$login', '$nom', '$prenom', '$email', '$hash')";
		$resultat = mysqli_query($db, $query);

		header('Location: index.php?page=login');
		exit;
	}

}
?>