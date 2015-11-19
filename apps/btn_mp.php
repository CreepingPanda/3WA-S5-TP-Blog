<?php

	if ( isset($_SESSION['id']) && $_GET['id']==$_SESSION['id'] ) {
		$unreadQuery = "SELECT COUNT(*) AS count FROM p_messages WHERE read = 0 AND id_reader = '".$_SESSION['id']."'";
		$unreadResult = mysqli_query($database, $unreadQuery);
		echo mysqli_error($database);
		$unread = mysqli_fetch_assoc($unreadResult);
		$unread = $unread['count'];
	}

	if ( isset($_SESSION['id']) )
	{
		require('views/btn_mp.phtml');
	}

?>