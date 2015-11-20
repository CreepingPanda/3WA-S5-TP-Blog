<?php
$nom ="";
$prenom="";
$login = "";
$email= "";
$password = "";
$password2 = "";
$avatar = "";
if (isset($_POST['login'], $_POST['password'], $_POST['password2'], $_POST['email'], $_POST['nom'], $_POST['prenom']))
{
	$login = mysqli_real_escape_string($database, $_POST['login']);
	$email = mysqli_real_escape_string($database, $_POST['email']);
	$nom = mysqli_real_escape_string($database, $_POST['nom']);
	$prenom = mysqli_real_escape_string($database, $_POST['prenom']);
	$password = mysqli_real_escape_string($database, $_POST['password']);
	$password2 = $_POST['password2'];
	$avatar = "http://www.laqt.org/images/pages/2013-10-16-16-29avatar";

	$query = "SELECT users.login FROM users WHERE login='".$login."'";
	$test= mysqli_query($database, $query);
	$testLogin = mysqli_fetch_assoc($test);

	if ($login == $testLogin['login'])
	{
		$errors[]= "login déjà utilisé";
	}

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
		$jour = date('j');
		$mois = date('M');
		$annee = date('Y');
		$date_register = $jour.' '.$mois.' '.$annee;
		$_SESSION['login'] = $login;
		$query = "INSERT INTO users (date_register, login, nom, prenom, email, password, avatar) VALUES('$date_register', '$login', '$nom', '$prenom', '$email', '$hash', '$avatar')";
		$resultat = mysqli_query($database, $query);

		header('Location: index.php?page=postRegister');
		exit;
	}

}
?>