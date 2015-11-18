<?php
echo "toto";
var_dump($_POST, $_GET); 



$statut="UPDATE users SET rights WHERE rights=statut" ;


mysqli_query($database, $statut);


exit;


?>