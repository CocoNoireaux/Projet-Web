<?php


define ('DB_SERVER','localhost');
define ('DB_USER','root');
define ('DB_PASS','');

//identifier le nom de la base de données
$database="eceamazon";

//connecter l'utilisateur dans BDD
$db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
$db_found=mysqli_select_db($db_handle,$database);


$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$photofond = isset($_POST["photofond"])? $_POST["photofond"] : "";
if($_POST["bouton"])
{
    if ($db_found)
    {
        $sql="INSERT INTO vendeur(pseudo, email, photo, photofond) VALUES ('$pseudo','$email','$photo','$photofond')";
        
$result = mysqli_query($db_handle, $sql);
	echo "L'ajout a bien été effectué";

    }

else 
{
    echo "data base not found";
}


	mysqli_close($db_handle);


}

?>

