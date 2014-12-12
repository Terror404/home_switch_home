<html>
    <head>
        <title>Mon Profil</title>
    </head>
    <body>
        <meta charset="utf-8" />
	<h1>Fiche profil</h1>
<ul>
    <?php
while ($donnees = $req->fetch())
{
	echo '<li>' . $donnees['login'] . $donnees['description'] . $donnees['rating'] . $donnees['description'] . $donnees['picture'] .'</li>';
}
?>
</ul>
<?php
$req->closeCursor();
?>
        <div>
			<input class="bouton" type="button" value="Me contacter" />
		</div>
		<div>
			<input class="bouton" type="button" value="Voir les commentaires" />
		</div>
    </body>
</html>
    