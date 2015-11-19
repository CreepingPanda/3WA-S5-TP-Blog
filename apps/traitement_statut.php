<?php
echo "toto";
var_dump($_POST, $_GET); 

$id = $_POST['id'];
$statut = $_POST['statut'];




$statut="UPDATE users SET rights='".$statut."' WHERE id=".$id ;


mysqli_query($database, $statut);

header('Location:index.php?page=userlist ');
exit;


?>