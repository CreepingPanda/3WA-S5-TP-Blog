<?php
$users = "SELECT users.*,COUNT(articles.id) AS nbr FROM users LEFT JOIN articles ON users.id=articles.id_author GROUP BY users.id ORDER BY login";

		$resultat = mysqli_query($database, $users);


require('views/userlist.phtml');
?>
