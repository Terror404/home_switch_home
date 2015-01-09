<?php
$DB = new PDO('mysql:host=localhost;dbname=exercice_app', 'root', '');
$req = $DB->prepare('SELECT nom, prenom FROM coureurs');
$req->execute(array('nom' => $nom,
                    'prenom' => $prenom,
        ));
$prenom1 = $_POST['prenom1']
?>
<html>
    <meta charset="utf-8">
    <heading>
        <title>Page de réponse à la première requete</title>
    </heading>
    
    <body>
        
        <h1><b>Bonjour <?php echo $prenom1 ?></b></h1>
        
        <p>Voici la réponse à votre requete : <?php echo ; ?> </p>
            
        <ul>
            <?php while ($nom = $req->fetch()) ?>
            <li><?php echo $nom ?></li>
        </ul>
        
        <a href="exercice_app_accueil.php">Revenir à la page d'accueil</a>
    </body>
</html>
