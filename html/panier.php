<head>
    <meta charset="utf-8">
    <title>Mon site</title>
    <link rel="stylesheet" href="sitephp.css">

</head>

<body class="fond">
    <ul id="menu">
        </li>
        <li><a href="kebab.html">Kebab</a>
        </li>
        <li><a href="Pizza.html">Pizza</a>
        </li>
        <li><a href="Burger.html">Burger</a>
        </li>
        <li><a href="panier.php">Panier</a>
        </li>
        <li><a href="connec.php">Connexion</a>
        </li>
    </ul>
</body>
<?php
session_start();
include_once("fonctions-panier.php");

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récupération des variables en POST ou GET
   $l = (isset($_POST[''])? $_POST['']:  (isset($_GET['l'])? $_GET['']:null )) ;
   $p = (isset($_POST[''])? $_POST['']:  (isset($_GET['p'])? $_GET['']:null )) ;
   $q = (isset($_POST[''])? $_POST['']:  (isset($_GET['q'])? $_GET['']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On vérifie que $p est un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['nom'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}

echo '<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html>
<head>
<title>Votre panier</title>
</head>
<body>

<form method="post" action="panier.php">
<table style="width: 400px">
    <tr>
        <td colspan="4">Votre panier</td>
    </tr>
   
    <head>
    <meta charset="utf-8">
    <title>Mon site</title>
    <link rel="stylesheet" href="sitephp.css">

</head>


    <?php
    if (creationPanier())
    {
       $nbArticles=count($_SESSION['panier']['nom']);
       if ($nbArticles == 0)
       echo "<tr><td>Votre panier est vide </ td></tr>";
       else
       {
          for ($i=0 ;$i < $nbArticles ; $i++)
          {
             echo "<tr>";
             echo "<td>".htmlspecialchars($_SESSION['panier']['nom'][$i])."</ td>";
             echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
             echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
             echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['nom'][$i]))."\">XX</a></td>";
             echo "</tr>";
          }

          echo "<tr><td colspan=\"2\"> </td>";
          echo "<td colspan=\"2\">";
          echo "Total : ".MontantGlobal();
          echo "</td></tr>";

          echo "<tr><td colspan=\"4\">";
          echo "<input type=\"submit\" value=\"Rafraichir\"/>";
          echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

          echo "</td></tr>";
       }
    }
    ?>
</table>
</form>
</body>
</html>