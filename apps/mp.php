<?php 
	$query = "SELECT *,p_messages.id AS pmid FROM p_messages LEFT JOIN users ON users.id=p_messages.id_writer WHERE id_reader='".$_SESSION['id']."' ORDER BY p_messages.id DESC";
	$mpPerso = mysqli_query($database, $query);
	while($mp = mysqli_fetch_assoc($mpPerso))
	{
		if (isset($_SESSION['id']))
		{
			$content = '';
			require('views/mp.phtml');
			require('views/mpRep.phtml');
		
		}
	}
 ?>