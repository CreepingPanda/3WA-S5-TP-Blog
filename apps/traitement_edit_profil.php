<?php
$nom ="";
$prenom="";
$login = "";
$email= "";
$password = "";
$password2 = "";
$avatar = "";
$id = $_GET['id'];

$queryUsers = "SELECT * FROM users WHERE id='".$id."'";
$resultUsers = mysqli_query($database, $queryUsers);
$dataUsers = mysqli_fetch_assoc($resultUsers);


if (isset($_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password'], $_POST['password2'], $_POST['avatar']))
{
	$login = mysqli_real_escape_string($_POST['login']);
	$nom = mysqli_real_escape_string($_POST['nom']);
	$prenom = mysqli_real_escape_string($_POST['prenom']);
	$email = mysqli_real_escape_string($_POST['email']);
	$avatar = mysqli_real_escape_string($_POST['avatar']);

	if (strlen($login) < 4)
	{
		$errors[] = "Login trop court";
	}
	if (strlen($nom) < 2)
	{
		$errors[] = "Nom trop court";
	}
	if (strlen($prenom) < 2)
	{
		$errors[] = "Prénom trop court";
	}
	if (strpos($email, '@') == FALSE)
	{
		$errors[] = "Veuillez entrer une adresse mail";
	}

	var_dump($errors);

	if (count($errors) == 0)
	{
		$query = "UPDATE users SET login = '".$login."', email = '".$email."', prenom = '".$prenom."', nom = '".$nom."', avatar = '".$avatar."' WHERE id = '".$id."' ";
		$resultat = mysqli_query($database, $query);
	
		header("Location: index.php?page=profil&id=".$_GET['id']);
		exit;
	
	}
	
}

if (isset($_POST['password'], $_POST['password2']))
{
	
	$password = $_POST['password'];
	$password2 = $_POST['password2'];


	if ($password != $password2)
	{
		$errors[] = "Les mots de passe ne correspondent pas";
	}
	elseif (strlen($password) < 6)
	{
		$errors[] = "Mot de passe trop court";
	}


	if (count($errors) == 0)
	{
		$hash = password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost"=>10));
		$queryMdp = "UPDATE users SET password = '".$hash."' WHERE id = '".$id."' ";
		$resultatMdp = mysqli_query($database, $queryMdp);
	
		header("Location: index.php?page=profil&id=".$_GET['id']);
		exit;
	
	}
	
}


?>

