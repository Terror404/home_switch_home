<p class="alert">
<?php
switch($end)
{
    case 0 : 
        echo"Votre commentaire et votre note ont été correctement ajoutés";
        break;
    case 1 :
        echo"Veuillez remplir la totalité des champs";
        break;
    case 2 :
        echo"Veuillez mettre un nombre entier pour la note";
        break;
    case 3 :
        echo"Les notes doivent être comprise entre 0 et 10";
        break;
}

</p>

