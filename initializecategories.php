<?php

include("modele/pdoDatabaseRef.php");
try {
    $tempQuery = $DB->prepare("
        INSERT INTO category (title, description)
        VALUES (:title, :desc)
    ");
    $tempQuery->execute(array(
        'title' => "Aide",
        'desc' => "Résolution de problèmes avec le site et remarques"
    ));
    $tempQuery->execute(array(
        'title' => "Vos expériences",
        'desc' => "Partagez vos expériences Home Switch Home"
    ));
    echo "Les catégorie ont été ajoutées avec succès.<br/><br/>";
}
catch (exception $e) {
    echo "Echec de la création de catégorie.<br/><br/>";
}