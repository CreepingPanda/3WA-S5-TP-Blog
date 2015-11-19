<?php
	if ( $artlist['note']==NULL ) {
		require('views/no_note_display.phtml');
	}else {
		require('views/note_display.phtml');
	}
?>