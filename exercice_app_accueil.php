
<html>
    <meta charset="utf-8">
    <head>
        <title>Page d'accueil</title>
    </head>
    
    <body>
        
        <h1><b>Bonjour</b></h1>
        
        <p>Veuillez remplir le formulaire ci-dessous.</p>
        
    <style type="text/css">
            div{
                border-width: 1px;
            }
    </style>
    <div>
    <form method="post" action="exercice_app_modele.php">
       
        
	<p>
            <label>Prénom :</label>
            <input type="text" name="prenom1" id="prenom1">
        </p>
        
        <p>
      
            Quelles requetes?<br /> 
            <input type="radio" name="y" value="choix1"><label>Liste de tous les coureurs (nom,prénom)</label><br />
            <input type="radio" name="y" value="choix2"><label>Tableau des équipes, et des coureurs par équipe</label><br />
            <input type="radio" name="y" value="choix3"><label>La liste des étapes, et pour chaque étape la liste des coureurs y ayayant participé, classés par ordre d'arrivée</label><br />
            
          
        </p>
        
        <input type="submit" name="envoyer" value="Envoyer">
        
        <input type="reset" name="annuler" value="Annuler">
    </form>
    </div>
        
    </body>