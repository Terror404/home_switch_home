<?php
//Get the favorites of the user
function list_favorites()
{
    try 
            {
                $DB = new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } 
        catch (Exception $ex) 
            {
                die ('Erreur:'.$ex ->getMessage());
            }
    
    $askFavs=$DB->prepare('SELECT * FROM favorites WHERE id_user=:iduser');
        $askFavs->execute(array('iduser'=>$_SESSION['userId']));

    while($resFavs=$askFavs->fetch())
    {
    if($resFavs['id_house']="" OR $resFavs['id_house']=NULL)
        {
            $stringFavs="";
        }
        else
        {
            $stringFavs=explode('/',$resFavs['id_house']);
        }
    }
}

//Update the favs with a new one
function add_favorites()
{
    try 
            {
                $DB = new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } 
        catch (Exception $ex) 
            {
                die ('Erreur:'.$ex ->getMessage());
            }
            
    $askFavs=$DB->prepare('SELECT * FROM favorites WHERE id_user=:iduser');
        $askFavs->execute(array('iduser'=>$_SESSION['userId']));

    while($resFavs=$askFavs->fetch())
    {
    if($resFavs['id_house']="" OR $resFavs['id_house']=NULL)
        {
            $stringFavs="";
        }
        else
        {
            $stringFavs=explode('/',$resFavs['id_house']);
        }
    }
            
    $arrayFavs=explode('/',$stringFavs);
    if(in_array($_GET['id'],$arrayFavs))
    {
        echo"Cette maison se trouve déja dans vos favoris";
    }
    else
    {
        array_push($arrayFavs,$_GET['id']);
        $arrayFavs=array_values($arrayFavs);
        $stringFavs=implode('/',$arrayFavs);
        $addFavs=$DB->prepare('UPDATE favorites SET id_house=$stringFavs WHERE id_user=:iduser');
            $addFavs->execute(array('iduser'=>$_SESSION['userId']));
        echo"La maison a bien été ajouté à vos favoris";
    }
}

//Delete the chosen fav and reorder the array before updating the database
function delete_favorites($stringFavs)
{
    try 
            {
                $DB = new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } 
        catch (Exception $ex) 
            {
                die ('Erreur:'.$ex ->getMessage());
            }
            
    $arrayFavs=explode('/',$stringFavs);
    if(in_array($GET['id'],$arrayFavs))
    {
        $key_id=array_search($_GET['id'],$arrayFavs);
        unset($arrayFavs['$key_id']);
        $arrayFavs=array_values(array_filter($arrayFavs));
        $stringFavs=implode('/',$arrayFavs);
        $addFavs=$DB->prepare('UPDATE favorites SET id_house=$stringFavs WHERE id_user=:iduser');
            $addFavs->execute(array('iduser'=>$_SESSION['userId']));
        echo"La maison a bien été retiré de vos favoris";
    }
    else
    {
        echo"Cette maison ne fait pas partie de vos favoris";
    }
}

//Delete all the favs
function delete_all_favorites($stringFavs)
{
    $deleteFavs=$DB->prepare('UPDATE favorites SET id_house="" WHERE id_user=:iduser');
        $deleteFavs->execute(array('iduser'=>$_SESSION['userId']));
}
