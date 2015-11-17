<?php
$users = "SELECT login FROM users";
		$resultat = mysqli_query($database, $users);


require('views/userlist.phtml');
?>
