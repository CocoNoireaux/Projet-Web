<?php


define ('DB_SERVER','localhost');
define ('DB_USER','root');
define ('DB_PASS','');

//identifier le nom de la base de données
$database="eceamazon";

//connecter l'utilisateur dans BDD
$db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
$db_found=mysqli_select_db($db_handle,$database);
if (!$db_found)
{
    
    echo "la connexion au serveur n'est pas établie";
}


$pseudo=$_POST['pseudo'];
$email=$_POST['email'];
$photo=$_POST['photo'];
$photofond=$_POST['photofond'];

$sql="INSERT INTO vendeur (pseudo, email, photo, photofond) VALUES ($pseudo,$email,$photo,$photofond)";

//fermer la connection
mysqli_close($db_handle);
?>