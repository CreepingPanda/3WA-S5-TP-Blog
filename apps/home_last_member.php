<?php

	$lastMemberQuery = "SELECT * FROM users ORDER BY id DESC LIMIT 0, 1";
	$lastMemberResult = mysqli_query($database, $lastMemberQuery);
	$lastMember = mysqli_fetch_assoc($lastMemberResult);

	require('views/home_last_member.phtml');
	
?>