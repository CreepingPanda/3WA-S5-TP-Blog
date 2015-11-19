<?php

	if ( isset($_SESSION['id']) && $_GET['id']==$_SESSION['id'] ) {
		$unreadQuery = "SELECT COUNT(*) AS count FROM p_messages WHERE read = 0 AND id_reader = '".$_SESSION['id']."'";
		$unreadResult = mysqli_query($database, $unreadQuery);
		$unreadAssoc = mysqli_fetch_assoc($unreadResult);
		$unread = $unreadAssoc['count'];
	}

	if ( isset($_SESSION['id']) )
	{
		require('views/btn_mp.phtml');
	}

?>