<?php 
    if(isset($_POST['title']) AND $_POST['title']!="")
        {
            $mod_title=$DB->prepare('UPDATE house SET title=:title WHERE id=:idhouse');
                $mod_title->execute(array('title'=>$_POST['title'], 'idhouse'=>$_GET['id']));
        }
    else
        {
            echo"Le champ n'est pas rempli correctement";
        }
?>

<?php
    if(isset($_POST['description']) AND $_POST['description']!="")
        {
            $mod_desc=$DB->prepare('UPDATE house SET description=:description WHERE id=:idhouse');
                $mod_desc->execute(array('description'=>$_POST['description'],'idhouse'=>$_GET['id']));
        }
    else
        {
            echo"Lechamp n'est pas rempli correctemet";
    }
?>

<?php 
    if(isset($_POST['modif_region']) AND !empty($_POST['modif_region']))
    {
    $mod_location=$DB->prepare('UPDATE house SET region=:modif_region, town=:modif_town, zipcode=:modif_zip WHERE id=:idhouse');
        $mod_location->execute(array('modif_region'=>$_POST['modif_region'],'modif_town'=>$_POST['modif_town'],'modif_zip'=>$_POST['modif_zip'],'idhouse'=>$_GET['id']));
    }
?>

<?php
    if(isset($_POST['']))
    $mod_info=$DB->prepare('UPDATE house SET type=:modif_type, capacity=:modif_cap, bedrooms=:modif_bed, facilities=:modif_fac');
        $mod_info->execute(array('modif_type'=>$_POST['modif_type'], 'modif_cap'=>$_POST['modif_cap'], 'modif_bed'=>$_POST['modif_bed'],'modif_fac'=>$_POST['modif_fac'],'idhouse'=>$_GET['id']));
?>        