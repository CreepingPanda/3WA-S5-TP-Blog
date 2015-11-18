<?php
// $_GET['idTarget'] => exist => nombre entier
if (isset($_GET['idTarget'])){
$query = "SELECT login FROM users WHERE users.id=".intval($_GET['idTarget']);
$idMp = mysqli_query($database,$query);
$idMpTab = mysqli_fetch_assoc($idMp);
	$loginTarget = $idMpTab['login'];
}
if (isset($_SESSION['id']))
{
	$content = '';
	require('views/addMp.phtml');
}
?>