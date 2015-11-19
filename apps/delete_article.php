<?php

	if ( isset($_SESSION['id']) && $_SESSION['rights']==2 ) {
		require('views/delete_article.phtml');
	}


?>