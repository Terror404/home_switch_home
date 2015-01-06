<?php

session_start();
    try
        {
            $DB=new PDO ("mysql:host=localhost;dbname=mabdd","root","root",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        } 
    catch (Exception $ex) 
        {
            die('Erreur'.$ex->getMessage());
        }
?>

Traduction
<form method="post" action="../modele/traduction.php">
    français : <input type="text" name="fr"/><br/>
    anglais : <input type="text" name="eng"/><br/>
    <input type="submit" value="Entrer"/>
</form>
<?php
$input=$DB->prepare("INSERT INTO traduction (french,english) VALUES (:french,:english)");
    $input->execute(array('french'=>$_POST['fr'],'english'=>$_POST['eng']));
    
echo"mot fr rentré :"; echo $_POST['fr'];echo"<br/>";
echo"mot fr rentré :"; echo $_POST['fr'];
