<?php
$login = "";
$password = "";
if (isset($_POST['login'], $_POST['password']))
{
	$login = mysqli_real_escape_string($db, $_POST['login']);
	$password = $_POST['password'];
	$query = "SELECT * FROM user WHERE login='".$login."'";
	$resultat = mysqli_query($db, $query);
	if ($resultat)
	{
		$user = mysqli_fetch_assoc($resultat);
		if ($user)
		{
			if (password_verify($password, $user['password']))
			{
				$_SESSION['id'] = $user['id'];
				$_SESSION['admin'] = (boolean)$user['admin'];
				$_SESSION['login'] = $user['login'];
				header('Location: index.php');
				exit;
			}
			else
			{
				$errors[] = "Incorrect password";
			}
		}
		else
		{
			$errors[] = "Login unknown";
		}
	}
	else
	{
		$errors[] = "Internal server error";
	}
}
?>

