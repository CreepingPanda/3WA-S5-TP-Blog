<?php
	{
		$query = "SELECT * FROM users WHERE login='".$_SESSION['login']."'";
		$test= mysqli_query($database, $query);
		$testLogin = mysqli_fetch_assoc($test);
		require('views/postRegister.phtml');
	}
?>