<?php

$database="espace_membre";

//connecter l'utilisateur dans BDD
$db_handle=mysqli_connect('localhost','root','');
$db_found=mysqli_select_db($db_handle,$database);


if(isset($_POST['forminscription']))
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$email = htmlspecialchars($_POST['email']);
	$email2 = htmlspecialchars($_POST['email2']);
	$motdepasse = sha1($_POST['motdepasse']);
	$motdepasse2 = sha1($_POST['motdepasse2']);

	if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['motdepasse']) AND !empty($_POST['motdepasse2']) )
	{
		
		$pseudolength = strlen($pseudo);
		if($pseudolength <= 255)
		{
			if($email == $email2)
			{
				if(filter_var($email, FILTER_VALIDATE_EMAIL))
				{ 

					if($motdepasse == $motdepasse2)
					{
						if ($db_found)
						{
							$sql="INSERT INTO membres(pseudo, email, motdepasse) VALUES ('$pseudo','$email','$motdepasse')";

							$result = mysqli_query($db_handle, $sql);
							$erreur = "L'ajout a bien été effectué";

						}

						else 
						{
							echo "data base not found";
						}


						mysqli_close($db_handle);
						
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
	<title>Membres</title>
	<meta charset="utf-8">
</head>
<body>
	<div align="center">
		<h2>Inscription</h2><br><br>
		<form method="POST" action="">
			<table>
				<tr>
					<td align="right">
						<label for="pseudo">Pseudo :</label>
					</td>

					<td>
						<input type="text" placeholder="Votre pseudo" id= "pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
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