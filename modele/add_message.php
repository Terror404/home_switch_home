<?php 
session_start();
?>

<?php /* déclaration des variables*/
    $DB= new PDO ('mysql:host=localhost; dbname=home_switch_home', 'root','');
    $idAuthor = $_SESSION['userId'];
    $idReceiver = $_POST ["login_receiver"];
    $title  =$_POST ["title"];
    $text = $_POST ["text"];

 
   
    $req = $DB -> prepare (
            'INSERT INTO messages(date, id_author, id_receiver, title, text)'
            . 'VALUES ( :date, :id_author, :id_receiver, :title, :text) '
        );
    $req->execute(array(
        'date' => date('d.m.y h:i:s'),
        'id_author' => $idAuthor,
        'id_receiver' => $idReceiver,
        'title' => $title,
        'text' => $text,
       ));
?>

