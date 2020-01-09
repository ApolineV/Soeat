<?php 

try {
$bdd= new PDO('mysql:host=localhost;dbname=Soeat','pilou', 'pilou'); //connexion pdo
       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
                  catch(Exception $e)                                      
                  {
                      die('Erreur :' .$e->getMessage()); 
                  }
                 
                  
            
                  
                    $req = $bdd->prepare('INSERT INTO Client(Nom, mdp) VALUES(?, ?)'); //insert le nom du client dans la BDD
                     $req->execute(array($_POST['nom'], $_POST['mdp'])); 

    

header('Location: connec.php') ?>
