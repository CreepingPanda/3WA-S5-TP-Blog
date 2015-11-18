<?php
// $_GET['idTarget'] => exist => nombre entier
$query = "SELECT login FROM users WHERE users.id=".intval($_GET['idTarget']);
$idMp = mysqli_query($database,$query);
$idMpTab = mysqli_fetch_assoc($idMp);
if (isset($_GET['idTarget'])){
	$loginTarget = $idMpTab['login'];
}
if (isset($_SESSION['id']))
{
	$content = '';
	var_dump($idMpTab);
	require('views/addMp.phtml');
}
?>