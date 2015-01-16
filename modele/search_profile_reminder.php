        <?php   /*Accès à la bdd*/
            try 
                {
                    $DB = new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                } 
            catch (Exception $ex) 
                {
                    die ('Erreur:'.$ex ->getMessage());
                }
        ?>
        <?php
            if(isset($_SESSION['userId']))
                {
                $bla=1
        ?>
                    <?php   /*Récupération du login*/
                        $idhouse=$_GET['id'];
                        $askNP=$DB->prepare('SELECT U.login FROM user U, house H WHERE U.id = H.id_user AND H.id=:idhouse');
                                $askNP->execute(array('idhouse'=>$idhouse));
                        /*$askNP->closeCursor();*/
                    ?>

                    <?php   /*Récupération de la description*/
                        $askDesc=$DB->prepare('SELECT U.description FROM User U,House H WHERE U.id = H.id_user AND H.id=:idhouse');
                             $askDesc->execute(array('idhouse' => $idhouse));
                       /*$askdesc->closeCursor()*/
                    ?>

                    <?php   /*Récupération photo de profil*/
                        $askPic=$DB->prepare('SELECT U.picture FROM User U, House H WHERE U.id=H.id_user AND H.id=:idhouse');
                                $askPic->execute(array('idhouse'=>$idhouse));
                        /*$askpic->closeCursor()*/
                    ?>

                    <?php
                        $askRate=$DB->prepare('SELECT U.rating FROM User U, House H WHERE U.id=H.id_user AND H.id=:idhouse');
                                $askRate->execute(array('idhouse'=>$idhouse));
                        /*$askrate->closeCursor()*/
                    ?>
        <?php   }
            else
                {
        ?>
                    <?php /*Récupération du login*/
                        $askNP=$DB->prepare('SELECT login FROM user WHERE id=:id');
                            $askNP->execute(array('id'=>$_SESSION['userId']));
                    ?>

                    <?php   /*Récupération de la description*/
                        $askDesc=$DB->prepare('SELECT description FROM user WHERE id = :id');
                             $askDesc->execute(array('id'=>$_SESSION['userId']));
                       /*$askdesc->closeCursor()*/
                    ?>

                    <?php   /*Récupération photo de profil*/
                        $askPic=$DB->prepare('SELECT picture FROM user WHERE id = :id');
                                $askPic->execute(array('id'=>$_SESSION['userId']));
                        /*$askpic->closeCursor()*/
                    ?>

                    <?php
                        $askRate=$DB->prepare('SELECT rating FROM user WHERE id = :id');
                                $askRate->execute(array('id'=>$_SESSION['userId']));
                        /*$askrate->closeCursor()*/
                    ?>
        <?php
                }
        ?>
