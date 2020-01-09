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
        <li><a href="">Panier</a>
        </li>
        <li><a href="connec.php">Connexion</a>
        </li>
    </ul>
</body>

<h2>Inscription</h2>
	<form action="registre.php" method="POST">
		<label>Identifiant :</label>
		<p><input type="text" name="nom" required /></p>
		<label>Mot de passe :</label>
		<p><input type="password" name="mdp" required /></p>
		<label>Retapez mot de passe :</label>
		<p><input type="password" name="password2" required /></p>
		<input type="submit"/>
</form>


