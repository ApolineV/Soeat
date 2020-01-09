<!DOCTYPE html>
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

<html>
	<head>
	<title>Exemple - Mot de passe</title>
	</head>
	<body>
	<br /><hr />

	<h2>Connexion</h2>
	<form action="connec.php" method="POST">

		<label>Identifiant :</label>
		<p><input type="text" name="nom" required /></p>
		<label>Mot de passe :</label>
	<p>	<input type="password" name="mdp" required /></p>
		<input type="submit" />
	</form>
	
	<form name="x" action="register.php" method="post">
<input type="submit" value="Inscription">
</form>
	</body>
</html>

