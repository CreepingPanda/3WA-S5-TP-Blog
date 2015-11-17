<?php
$nom ="";
$prenom="";
$login = "";
$email= "";
$password = "";
$password2 = "";
$avatar = "";
$id = 0;

if (isset($_POST['login']))
{
	$queryUsers = "SELECT * FROM users WHERE id='".$id."'";
	$resultUsers = mysqli_query($database, $queryUsers);
	$dataUsers = mysqli_fetch_assoc($resultUsers);


	$login = $_POST['login'];
	$email = $_POST['email'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$avatar = $_POST['avatar'];


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
		$queryEmail = "UPDATE users SET email = '".$email."' WHERE id = '".$id."' ";
		$queryNom = "UPDATE users SET nom = '".$nom."' WHERE id = '".$id."' ";
		$queryPrenom = "UPDATE users SET prenom = '".$prenom."' WHERE id = '".$id."' ";
		$queryLogin = "UPDATE users SET login = '".$login."' WHERE id = '".$id."' ";
		$queryAvatar = "UPDATE users SET avatar = '".$avatar."' WHERE id = '".$id."' ";
		$queryPassword = "UPDATE users SET password = '".$hash."' WHERE id = '".$id."' ";
		$resultatEmail = mysqli_query($database, $queryEmail);
		$resultatNom = mysqli_query($database, $queryNom);
		$resultatPrenom = mysqli_query($database, $queryPrenom);
		$resultatLogin = mysqli_query($database, $queryLogin);
		$resultatAvatar = mysqli_query($database, $queryAvatar);
		$resultatPassword = mysqli_query($database, $queryPassword);


		header('Location: index.php?page=profil');
		exit;
	
		}
}

?>