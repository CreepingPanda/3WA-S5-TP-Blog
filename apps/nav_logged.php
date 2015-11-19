<?php

	$unread = "";
	
	if ( isset($_SESSION['id']) )
	{
		$reader = intval($_SESSION['id']);
		$unreadQuery = "SELECT COUNT(*) AS count FROM p_messages WHERE `read` = 0 AND id_reader = $reader";
		$unreadResult = mysqli_query($database, $unreadQuery);
		$unreadAssoc = mysqli_fetch_assoc($unreadResult);
		$unread = $unreadAssoc['count'];
	}

	require('views/nav_logged.phtml');
	
?>