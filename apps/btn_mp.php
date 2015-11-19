<?php

	if ( isset($_SESSION['id']) && $_GET['id']==$_SESSION['id'] )
	{
		$reader = intval($_SESSION['id']);
		$unreadQuery = "SELECT COUNT(*) AS count FROM p_messages WHERE `read` = 0 AND id_reader = $reader";
		$unreadResult = mysqli_query($database, $unreadQuery);
		$unreadAssoc = mysqli_fetch_assoc($unreadResult);
		$unread = $unreadAssoc['count'];
	}

	if ( isset($_SESSION['id']) )
	{
		require('views/btn_mp.phtml');
	}

?>