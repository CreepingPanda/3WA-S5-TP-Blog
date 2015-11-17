<?php
if (isset($_SESSION['id']))
{
	$content = '';
		require('views/note.phtml');
}
?>