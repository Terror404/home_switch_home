<?php 
    if(isset($_POST['title']))
    {
        if(!empty($_POST['title']))
        {
            $mod_title=$DB->prepare('UPDATE house SET title=:title WHERE id=:idhouse');
                $mod_title->execute(array('title'=>$_POST['title'], 'idhouse'=>$_GET['id']));
            $end=2;
        }
        else
        {
            $end=0;
        }
    }

    if(isset($_POST['description']))
    {
        if(!empty($_POST['description']))
        {
            $mod_desc=$DB->prepare('UPDATE house SET description=:description WHERE id=:idhouse');
                $mod_desc->execute(array('description'=>$_POST['description'],'idhouse'=>$_GET['id']));
            $end=2;
        }
        else
        {
            $end=0;
        }
    }

    if(isset($_POST['region']))
    {
        if(!empty($_POST['region']))
        {
            $mod_area=$DB->prepare('UPDATE house SET id_area=(SELECT id FROM area WHERE name=:name) WHERE id=:idhouse');
                $mod_area->execute(array('name'=>$_POST['region'], 'idhouse'=>$_GET['id']));
            $end=2;
        }
        else
        {
            $end=0;
        }
    }
    
    if(isset($_POST['capacity']))
    {
        if(!empty($_POST['capacity']))
        {
            $mod_cap=$DB->prepare('UPDATE house SET nbr_people=:capacity WHERE id=:idhouse');
                $mod_cap->execute(array('capacity'=>$_POST['capacity'], 'idhouse'=>$_GET['id']));
            $end=2;
        }
        else
        {
            $end=0;
        }
    }
    
    if(isset($_POST['nbbr']))
    {
        if(!empty($_POST['nbbr']))
        {
            $mod_nbbr=$DB->prepare('UPDATE house SET nbr_room=:nbbr WHERE id=:idhouse');
                $mod_nbbr->execute(array('nbbr'=>$_POST['nbbr'], 'idhouse'=>$_GET['id']));
            $end=2;
        }
        else
        {
            $end=0;
        }
    }
    
    if(isset($_POST['house_type']))
    {
        if(!empty($_POST['house_type']))
        {
            $mod_cap=$DB->prepare('UPDATE house SET house_type=:type WHERE id=:idhouse');
                $mod_cap->execute(array('type'=>$_POST['house_type'], 'idhouse'=>$_GET['id']));
            $end=2;
        }
        else
        {
            $end=0;
        }
    }
    
    if(isset($_POST['address']))
    {
        if(!empty($_POST['address']))
        {
            $address=str_replace('\'', '', $_POST['address']);
            $mod_cap=$DB->prepare('UPDATE house SET address=:address WHERE id=:idhouse');
                $mod_cap->execute(array('address'=>$address, 'idhouse'=>$_GET['id']));
            $end=2;
        }
        else
        {
            $end=0;
        }
    }
    
    if(isset($_POST['town'])AND isset($_POST['zipcode']))
    {
        if(!empty($_POST['zipcode']) AND !empty($_POST['town']))
        {
            $town1=str_replace('-', '&nbsp', $_POST['town']);
            $town2=strtolower($town1);


            $askzip=$DB->prepare('SELECT ville_code_postal, ville_code_commune FROM villes_france_free WHERE ville_nom_simple =:nomVille');
                $askzip->execute(array(':nomVille'=>$town2));

            while($reszip=$askzip->fetch())
            {
                $zip=$reszip['ville_code_postal'];
                $zip2=$reszip['ville_code_commune'];
            }

            if($zip==$_POST['zipcode'] OR $zip2==$_POST['zipcode'])
            {
                $askIdTown=$DB->prepare("SELECT ville_id FROM villes_france_free WHERE ville_nom_simple=:nomVille");
                    $askIdTown->execute(array('nomVille'=>$town2));
                while($resIdTown=$askIdTown->fetch())
                {
                    $idTown=$resIdTown['ville_id'];
                }
                $addH=$DB->prepare('UPDATE house SET ville_id=:villeid WHERE id=:houseid');
                    $addH->execute(array('villeid'=>$idTown, 'houseid'=>$_GET['id']));
                $end=2;
            }
            else
            {
                $end=1;
            }
        }
        else
        {
            $end=0;
        }
    }