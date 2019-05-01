<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=eceshop', 'root', '');

if(isset($_POST['forminscription']))
{
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$email = htmlspecialchars($_POST['email']);
	$email2 = htmlspecialchars($_POST['email2']);
	$motdepasse = sha1($_POST['motdepasse']);
	$motdepasse2 = sha1($_POST['motdepasse2']);
	$type_utilisateur = htmlspecialchars($_POST['type_utilisateur']);
	$photo_profil = htmlspecialchars($_POST['photo_profil']);

	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['motdepasse']) AND !empty($_POST['motdepasse2'] AND !empty($_POST['type_utilisateur']) AND !empty($_POST['photo_profil'])) )
	{
		
		$nomlength = strlen($nom);
		if($nomlength <= 255)
		{
			if($email == $email2)
			{
				if(filter_var($email, FILTER_VALIDATE_EMAIL))
				{ 

					if($motdepasse == $motdepasse2)
					{
						$insertmbr = $bdd->prepare("INSERT INTO utilisateur(nom, prenom, email, motdepasse, type_utilisateur, photo_profil) VALUES (?, ?, ?, ?, ?, ?");
						$insertmbr->execute(array($nom, $prenom, $email, $motdepasse, $type_utilisateur, $photo_profil));
						$erreur = "Votre compte a été créé <a href=\"connexion.php\">Me connecter</a>";
					}
					
					else
					{
						$erreur = "Vos mot de passe ne correspondent pas !";
					}
				}
				else
				{
					$erreur = "Votre adresse mail n'est pas valide";
				}

			}
			else
			{
				$erreur = "Vos adresses mail ne correspondent pas !";
			}

		}
		else
		{
			$erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
		}
	}
	else
	{
		$erreur = "Tous les champs doivent être complétés";
	}
}


?>

<html>
<head>
	<title>Utilisateurs</title>
	<meta charset="utf-8">
</head>
<body>
	<div align="center">
		<h2>Inscription</h2><br><br>
		<form method="POST" action="">
			<table>
				<tr>
					<td align="right">
						<label for="nom">Nom :</label>
					</td>

					<td>
						<input type="text" placeholder="Votre nom" id= "nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="prenom">Prenom :</label>
					</td>

					<td>
						<input type="text" placeholder="Votre prenom" id= "prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>">
					</td>
				</tr>

				<tr>
					<td align="right">
						<label for="email">Email :</label>
					</td>

					<td>
						<input type="email" placeholder="Votre email" id= "email" name="email" value="<?php if(isset($email)) { echo $email; } ?>">
					</td>

				</tr>
				<tr>
					<td align="right">
						<label for="email2">Confirmation du mail :</label>
					</td>

					<td>
						<input type="text" placeholder="Confirmation email" id= "email2" name="email2" value="<?php if(isset($email2)) { echo $email2; } ?>">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="motdepasse">Mot de passe :</label>
					</td>

					<td>
						<input type="password" placeholder="Votre mdp" id= "motdepasse" name="motdepasse">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="motdepasse2">Confirmation Mdp :</label>
					</td>

					<td>
						<input type="password" placeholder="Confirmation mdp" id= "motdepasse2" name="motdepasse2">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="type_utilisateur">Type Utilisateur :</label>
					</td>

					<td>
						<input type="text" placeholder="Vendeur/Acheteur/Admin" id= "type_utilisateur" name="type_utilisateur" value="<?php if(isset($type_utilisateur)) { echo $type_utilisateur; } ?>">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="photo_profil">Photo profil :</label>
					</td>

					<td>
						<input type="text" placeholder="Votre photo" id= "photo_profil" name="photo_profil" value="<?php if(isset($photo_profil)) { echo $photo_profil; } ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td align="center">
						<br>
						<input type="submit" name="forminscription" value="Je m'inscris">
					</td>
				</tr>


			</table>
		</form>
		<?php
		if(isset($erreur))
		{
			echo $erreur;
		}

		?>
	</div>

</body>
</html>