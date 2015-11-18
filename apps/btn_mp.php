<?php

if ( isset($_SESSION['id']) && $_GET['id']==$_SESSION['id'] ) {
	$unreadQuery = "SELECT COUNT(*) FROM p_messages WHERE read = 0 AND id_reader = '".$_SESSION['id']."'";
	$unread = mysqli_query($database, $unreadQuery);
}

if ( isset($_SESSION['id']) )
{
	require('views/btn_mp.phtml');
}

?>