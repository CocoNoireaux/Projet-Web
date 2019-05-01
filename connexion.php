<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_POST['formconnect']))
{
	
	$emailconnect = htmlspecialchars($_POST['emailconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if(!empty($emailconnect) AND !empty($mdpconnect))
	{
		$requser = $bdd->prepare("SELECT * FROM membres WHERE email = ? AND motdepasse = ?");
		$requser->execute(array($emailconnect, $mdpconnect));
		$userexist = $requser->rowCount();
		if($userexist == 1)
		{
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['email'] = $userinfo['email'];
			header("Location: profil.php?id=" .$_SESSION['id']);
		}
		else
		{
			$erreur = "Mauvais id";
		} 
	}
	else
	{
		$erreur = "Tous les champs doivent être remplis";
	}
}

	?>

	<html>
	<head>
		<title>Connexion membres</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div align="center">
			<h2>Connexion</h2><br><br>
			<form method="POST" action="">
				<input type="text" name="emailconnect" placeholder="Email"><br>
				<input type="password" name="mdpconnect" placeholder="Mot de passe"><br>
				<input type="submit" name="formconnect" value="Se connecter">
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