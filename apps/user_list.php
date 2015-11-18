<?php
while ($user = mysqli_fetch_assoc($resultat))
{
	require('views/user_list.phtml');
}

?>