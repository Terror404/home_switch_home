    <?php
/*******************************************************************************
 * For uploading pic
 ******************************************************************************/
$id_user=$_SESSION['userId'];

//Creation of a directory for each user
if(!is_dir("../view/pictures/".$id_user))
{
    mkdir("../view/pictures/".$id_user,755);
}
                
define('MAX_SIZE',100000);                      //Maximal size of the pic (byte)
define('WIDTH_MAX',5000);                       //Maximum width of the pic (pixels)
define('HEIGHT_MAX',5000);

for($i=0;$i<2;$i++)
{
                global $i;
                switch($i)
                {
                    case 0:
                        $dossier_user="../view/pictures/".$id_user."/pictures/";
                        break;
                    case 1:
                        $dossier_user="../view/pictures/".$id_user."/photo1/";
                        break;
                    case 2:
                        $dossier_user="../view/pictures/$id_user/photo2/";
                        break;
                    case 3:
                        $dossier_user="../view/pictures/$id_user/photo3/";
                        break;
                    case 4:
                        $dossier_user="../view/pictures/$id_user/photo4/";
                        break;
                    case 5:
                        $dossier_user="../view/pictures/$id_user/photo5/";
                        break;
                    case 6:
                        $dossier_user="../view/pictures/$id_user/photo6/";
                        break;
                    case 7:
                        $dossier_user="../view/pictures/$id_user/profile/";
                        break;
                }


                //Creation of a directory for each type of pic
                if(!is_dir($dossier_user))
                {
                    mkdir($dossier_user,755);
                }

                /**********Variables Definition**********/
                $tabEx=array('jpg','jpeg','png','gif');         //authorized pic extensions
                $infoPic="";

                $ext="";
                $message="";
                $namePic="";

                /**********Upload Script**********/
                if(isset($_POST))
                {
                    //Verify if there is a file
                    if(isset($_FILES['photo'.$i]['name'])) 
                    {
                        //Get the extension of the file
                        $ext=pathinfo($_FILES['photo'.$i]['name'],PATHINFO_EXTENSION);
                        //Verify if the extension is allowed
                        if(in_array(strtolower($ext),$tabEx))
                        {
                            //Get the size info of the image
                            $infoPic=  getimagesize($_FILES['photo'.$i]['tmp_name']);
                            //Verify the type of the image
                            if($infoPic[2]>=1 && $infoPic[2]<=14)
                            {
                                //Verify the dimension and size of the image
                                if(($infoPic[0] <= WIDTH_MAX) && ($infoPic[1] <= HEIGHT_MAX) && (filesize($_FILES['photo'.$i]['tmp_name']) <= MAX_SIZE))
                                {
                                    //Scan the errors array
                                    if(isset($_FILES['photo'.$i]['error']) && UPLOAD_ERR_OK === $_FILES['photo'.$i]['error'])
                                    {
                                        //Rename the file
                                        $namePic = md5(uniqid()) .'.'. $ext;
                                        //Upload test
                                        if(move_uploaded_file($_FILES['photo'.$i]['tmp_name'], $dossier_user.$namePic))
                                        {
                                            $message="Télechargement de l'image réussi";
                                            $p[$i]=$dossier_user.$namePic;
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
                echo$dossier_user."/".$namePic;echo"<br/>";
                echo$_FILES['photo'.$i]['name'];echo"<br/>";
                echo$_FILES['photo'.$i]['tmp_name'];echo"<br/>";
                
}
                ?>
