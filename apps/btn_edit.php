<?php

if (isset($_SESSION['id']))
{
	if($_GET['id'] == $_SESSION['id']) {
		require('views/btn_edit.phtml');
	}
	
}

?>