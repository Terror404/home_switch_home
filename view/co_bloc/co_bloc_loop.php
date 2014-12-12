<?php
include "../modele/search_co_bloc.php"
?>
<?php
if(isset($_POST) AND $_POST['login']!="" AND $_POST['password']!="")
    {
        extract($_POST);
        while($resPass=$askPass->fetch())
            {
                        if($_POST['password']!=$resPass['password']) 
                            {
                            ?>
                                <div class="WrongPass">Echec de connexion : login ou mot de passe incorrect.</div>
                            <?php
                                global $blocConnexion;
                                $blocConnexion=2;
                            }
                        else 
                            {
                                $_SESSION['userLogin']=$_POST['login'];
                                while($resId=$askId->fetch())
                                {
                                    $_SESSION['userId']=$resId['id'];
                                }
                                while($resPic=$askPic->fetch())
                                {
                                    $_SESSION['userPic']=$resPic['picture'];
                                }
                            }
                    
            }
    }          
 else 
    {
        ?> <div class="NoLogPass">Veuillez remplir les champs correctment</div> <?php
        global $blocConnexion;
        $blocConnexion=2;
    }
