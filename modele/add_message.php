<?php
session_start();
try
        {
            $DB=new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        } 
    catch (Exception $ex) 
        {
            die('Erreur'.$ex->getMessage());
        }
?>



<?php
    if(isset($_POST['id_receiver']) AND $_POST['id_receiver']!=NULL AND $_POST['id_receiver']!=""
            AND isset($_POST['title'])AND $_POST['title']!=NULL AND $_POST['title']!=""
            AND isset($_POST['text'])AND $_POST['text']!=NULL AND $_POST['text']!=""
            )
    {
    $idAuthor = $_SESSION['userId'];
    $idReceiver = $_POST ['id_receiver'];
    $title  =$_POST ['title'];
    $text = $_POST ['text'];
    
    /* ajout du nouveau message à la base de données*/
   
    $req = $DB -> prepare ('INSERT INTO messages(date, id_author, id_receiver, title, text) VALUES ( :date, :id_author, :id_receiver, :title, :text)');
    $req->execute(array(
        'date' => date('d.m.y h:i:s'),'id_author' => $idAuthor,'id_receiver' => $idReceiver,'title' => $title, 'text' => $text));
    }
?>