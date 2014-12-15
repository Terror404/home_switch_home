<?php 
session_start();
?>

<?php /* déclaration des variables*/
    $DB= new PDO ('mysql:host=localhost; dbname=home_switch_home', 'root','');
    $idAut = $_SESSION['userId'];
    $logRec = $_POST ["login_receiver"];
    $title  =$_POST ["title"];
    $text = $_POST ["text"];

   /* transforme le login du receiver en son id dans la base de données */
    $askIdRec = $DB -> prepare ('SELECT id FROM user WHERE login =: loginRec');
    $askIdRec-> execute (array('loginRec' => $logRec));
    
    /* ajout du nouveau message à la base de données*/
    $req = $DB -> prepare ('INSERT INTO messages(date, id_author, id_receiver, title, text) VALUES ( :date, :id_author, :id_receiver, :title, :text) ');
    $req->execute(array(
        'date' => date('d.m.y h:i:s'),
        'id_author' => $idAut,
        'id_receiver' => $askIdRec->fetch(),
        'title' => $title,
        'text' => $text,
       ));
?>

