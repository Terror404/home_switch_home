<?php

/*******************************************************************************
 * For the profile pic
 ******************************************************************************/

$id_user=$_SESSION['userId'];
$dossier_user="../view/pictures/".$id_user;

if(!is_dir($dossier_user))
{
    mkdir($dossier_user,0755);
}

/**********Variables Definition**********/
define('TARGET','$dossier_user');               //Targeted repository
define('MAX_SIZE',100000);                      //Maximal size of the pic (byte)
define('WIDTH_MAX',500);                        //Maximum width of the pic (pixels)
define('HEIGHT_MAX',500);                       //Maximum height of the pic (pixels)

$tabEx=array('jpg','jpeg','png','gif');         //authorized pic extensions
$infoPic="";

$ext="";
$message="";
$namePic="";

/**********Upload Script**********/
if(isset($_POST))
{
    //Verify if there is a file
    if(isset($_FILES['fichier']['name'])) 
    {
        //Get the extension of the file
        $ext=pathinfo($_FILES['fichier']['name'],PATHINFO_EXTENSION);
        //Verify if the extension is allowed
        if(in_array(strtolower($ext),$tabEx))
        {
            //Get the size info of the image
            $infoPic=  getimagesize($_FILES['fichier']['tmp_name']);
            //Verify the type of the image
            if($infoPic[2]>=1 && $infoImg[1]<=14)
            {
                //Verify the dimension and size ofthe image
                if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
                {
                    //Scan the errors array
                    if(isset($_FILES['fichier']['error']) && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
                    {
                        //Rename the file
                        $namePic = md5(uniqid()) .'.'. $extension;
                        //Upload test
                        if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
                        {
                            $message="Télechargement de l'image réussi";
                        }
                        else
                        {
                            $message="Problème lors du télechargement de l'image";
                        }   
                    }
                    else
                    {
                        $message="Une erreur interne a empéché le télechargement de l'image";
                    } 
                }
                else
                {
                    $message="Erreur dans les dimensions de l'image";
                }
            }
            else
            {
                $message="Le fichier n'est pas une image !";
            }
        }
        else
        {
            $message="Extension du fichier incorrecte !";
        }
    }
    else
    {
        $message="Veuillez remplir le champ SVP !";
    }
}
    




