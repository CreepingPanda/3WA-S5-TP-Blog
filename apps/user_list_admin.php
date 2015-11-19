<?php

	if (isset($_SESSION['rights']) && $_SESSION['rights'] == 2 ) {
		
		require('views/user_list_admin.phtml');	
	
}
	
?>