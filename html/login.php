<?php
//Connexion à la base de données

$pdo = new PDO('mysql: host=localhost; dbname=Soeat', 'pilou', 'pilou');
	
//Nous vérifions que l'utilisateur a bien envoyé les informations demandées 
if(isset($_POST["Nom"]) && isset($_POST["mdp"])){
	// hash cet utilisateur à notre base de données :
	$query = $pdo->prepare('SELECT mdp FROM Soeat WHERE Nom = :Nom');
	$query->bindParam(':Nom', $_POST["nom"]);
	$query->execute();
	$result = $query->fetch();
	$hash = $result[0];
	
	// vérification si le mot de passe utilisé correspond bien à ce hash à l'aide de password_verify :
	$correctPassword = password_verify($_POST["mdp"], $hash);
	
	if($correctPassword){
		//Si oui nous accueillons l'utilisateur identifié
		echo "vous etes connecté";	
	}else{
		//erreur d'identifiant ou de mot de passe
		echo "login/password incorrect";
	}
}
?>