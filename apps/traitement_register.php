<?php
$login = "";
$email= "";
$password = "";
$password2 = "";
if (isset($_POST['login'], $_POST['password'], $_POST['password2'], $_POST['email']))
{
	$login = $_POST['login'];
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
	if (count($errors) == 0)
	{
		$hash = password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost"=>10));
		$query = "INSERT INTO users (login, email, password) VALUES('$login', '$email', '$hash')";
		$resultat = mysqli_query($database, $query);

		header('Location: index.php?page=login');
		exit;
	}

}
?>