<?php

	$lastMemberQuery = "SELECT * FROM users ORDER BY id DESC LIMIT 0, 6";
	$lastMemberResult = mysqli_query($database, $lastMemberQuery);
	

while ( $lastMember = mysqli_fetch_assoc($lastMemberResult) ) {
	require('views/home_last_member.phtml');
}

?>