<?php 
	$query = "SELECT * FROM p_messages LEFT JOIN users ON users.id=p_messages.id_writer WHERE id_reader='".$_SESSION['id']."' ORDER BY p_messages.date DESC";
	$mpPerso = mysqli_query($database, $query);
	while($mp = mysqli_fetch_assoc($mpPerso))
	{
		require('views/mp.phtml');
	}
 ?>