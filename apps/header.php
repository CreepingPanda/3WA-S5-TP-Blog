<?php
if (isset($_SESSION['id']))
{
	if ($_SESSION['rights'] == 2)
	{
		require('views/header_admin.phtml');
	}
	elseif ($_SESSION['rights'] == 1)
	{
		require('views/header_logged.phtml');
	}
}
else
{
	require('views/header.phtml');
}
?>