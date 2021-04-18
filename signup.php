<!DOCTYPE html>
<html>
<head>
	<title>S'inscrire - Paulin - Confitures</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="images/logo.png">
</head>
<body>
	<div id="carte">
		<h1>Paulin Confitures</h1>
		<?php include 'menu.php'; ?>
		<h2>Inscriver vous pour acceder à l'espace membre :</h2>
		<form method="post">
			<input type="text" name="pseudo" id="pseudo" placeholder="Votre nom d'utilisateur" required><br>
			<input type="email" name="email" id="email" placeholder="Votre email" required><br>
			<input type="password" name="password" id="password" placeholder="Votre mot de passe" required><br>
			<input type="password" name="cpassword" id="cpassword" placeholder="Confiermer votre mot de passe" required><br>
			<input type="submit" name="formsend" id="formsend" value="S'inscrire"><br>
		</form>
		<?php 

			if(isset($_POST['formsend'])){
				$pseudo = $_POST['pseudo'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];

				if(!empty($pseudo) && !empty($email) && !empty($password) && !empty($cpassword)){
					if ($password == $cpassword) {

						include 'database.php';
						global $db;

						$q = $db->prepare("INSERT INTO users(pseudo,email,password) VALUES(:pseudo,:email,:password");
						$q->execute([
							'pseudo' -> $pseudo,
							'email' -> $email,
							'password' -> $password
						]);
					}
				}else{
					echo "Veuillez remplire tous les champs.";
				}
			}


		 ?>
		<p>Vous possedez deja un compte ? <a href="login.php">Connectez-vous</a></p>
	</div>
</body>
</html>