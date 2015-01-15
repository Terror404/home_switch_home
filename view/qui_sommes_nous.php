<html>
    <meta charset="utf-8"/>
        <header>
            <title> <?php echo $_SESSION['$quiSomNou']; ?> </title>
        </header>
        
    <body>
        <h1> <?php echo $_SESSION['$quiSomNou']; ?> </h1>
        
        <h2>Qu'est ce que <b>Home Switch Home</b>?</h2>
        
        <p>HomeSwitchHome est la plateforme idéale pour l'échange de maisons. Il vous suffit de vous créer un compte pour pouvoir poster sans attendre votre annonce de logement. Ensuite il ne vous reste plus qu'à contacter les membres dont les offres vous intéressent afin de leur faire une proposition d'échange. De même les membres conquis par votre logement pourront alors vous contacter.
            <?php
            $fp = fopen("Fichier Texte Back Office.odt", "r");
            $contenu_du_fichier = fgets($fp,255);
            fclose($fp);
            echo $contenu_du_fichier;
            ?>
        </p>
        
        <h2><?php ?></h2>
        
        <p><?php ?></p>
    </body>
</html>

