<?php

$nom = isset($_POST["nom"])? $_POST["nom"] : "";

$photo = isset($_POST["photo"])? $_POST["photo"] : "";

$description = isset($_POST["dexcription"])? $_POST["description"] : "";

$video = isset($_POST["video"])? $_POST["video"] : "";

$prix = isset($_POST["prix"])? $_POST["prix"] : "";

$sexe = isset($_POST["sexe"])? $_POST["sexe"] : "";

$taille = isset($_POST["taille"])? $_POST["taille"] : "";

$auteur = isset($_POST["auteur"])? $_POST["auteur"] : "";

$annee = isset($_POST["annee"])? $_POST["annee"] : "";

$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";

//identifier le nom de la base de données

$database="eceamazon";



//connecter l'utilisateur dans BDD

$db_handle=mysqli_connect('localhost','root','');

$db_found=mysqli_select_db($db_handle,$database);



if($_POST["bouton"])

{

    if ($db_found)

    {

        $sql="INSERT INTO item(nom, photo, description, video,prix,sexe,taille,auteur,annee,categorie) VALUES ('$nom','$photo','$description','$video','$prix','$sexe','$taille','$auteur','$annee','$categorie')";

        

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