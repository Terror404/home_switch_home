<?php
/*A enlever si mis dans content.php*/
session_start();
/*******************************************************************************
 * For the profile pic
 ******************************************************************************/

$id_user=$_SESSION['userId'];
$dossier_user="../view/pictures/$id_user/";

//Creation of a folder for each user
if(!is_dir($dossier_user))
{
    mkdir($dossier_user,0755);
}

/**********Variables Definition**********/
define('TARGET',$dossier_user);                 //Targeted repository
define('MAX_SIZE',100000);                      //Maximal size of the pic (byte)
define('WIDTH_MAX',5000);                       //Maximum width of the pic (pixels)
define('HEIGHT_MAX',5000);                      //Maximum height of the pic (pixels)

$tabEx=array('jpg','jpeg','png','gif');         //authorized pic extensions
$infoPic="";

$ext="";
$message="";
$namePic="";

/**********Upload Script**********/
if(isset($_POST))
{
    //Verify if there is a file
    if(isset($_FILES['photo0']['name'])) 
    {
        //Get the extension of the file
        $ext=pathinfo($_FILES['photo0']['name'],PATHINFO_EXTENSION);
        //Verify if the extension is allowed
        if(in_array(strtolower($ext),$tabEx))
        {
            //Get the size info of the image
            $infoPic=  getimagesize($_FILES['photo0']['tmp_name']);
            //Verify the type of the image
            if($infoPic[2]>=1 && $infoPic[2]<=14)
            {
                //Verify the dimension and size ofthe image
                if(($infoPic[0] <= WIDTH_MAX) && ($infoPic[1] <= HEIGHT_MAX) && (filesize($_FILES['photo0']['tmp_name']) <= MAX_SIZE))
                {
                    //Scan the errors array
                    if(isset($_FILES['photo0']['error']) && UPLOAD_ERR_OK === $_FILES['photo0']['error'])
                    {
                        //Rename the file
                        $namePic = md5(uniqid()) .'.'. $ext;
                        //Upload test
                        if(move_uploaded_file($_FILES['photo0']['tmp_name'], TARGET.$namePic))
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
else
{
    $message="Erreur Serveur";
}
    

echo$message;echo"<br/>";
echo $dossier_user."/".$namePic;echo"<br/>";
echo$_FILES['photo0']['name'];echo"<br/>";
echo$_FILES['photo0']['tmp_name'];
?>