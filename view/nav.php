<nav>
    

<ul class="linkBlockList" >
	<li class="linkBlockElement" <?php if(!isset($_SESSION['userId'])){ echo 'style="width:25%"'; }?>><a class="linkBlock" href="../controler/content.php?page=news" >
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['accueil']; 
                            }
                            else 
                            {
                                echo 'News';
                            }
                            ?>  
            </a></li>
	<li class="linkBlockElement" <?php if(!isset($_SESSION['userId'])){ echo 'style="width:25%"'; }?>><a class="linkBlock" href="../controler/content.php?page=forumIndex" >Forum</a></li>
	<li class="linkBlockElement" <?php if(!isset($_SESSION['userId'])){ echo 'style="width:25%"'; }?>><a class="linkBlock" href="../controler/content.php?page=research" > 
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['rech']; 
                            }
                            else 
                            {
                                echo 'Recherche';
                            }
                            ?> 
            </a></li>
	
            <?php if(isset($_SESSION['userId']))
            {
            echo '';?>
            <li class="subMenuDisplayer">
		<a class="linkBlock" href=""> 
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['monCompt']; 
                            }
                            else 
                            {
                                echo 'Mon compte';
                            }
                            ?> 
                </a>
		<ul class="subMenuBlockList">
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=myProfile&userId=<?php echo $_SESSION['userId']?>" > 
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['monProf']; 
                            }
                            else 
                            {
                                echo 'Mon profil';
                            }
                            ?> 
                        </a></li>
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_exchanges" > 
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['mesEch']; 
                            }
                            else 
                            {
                                echo 'Mes échanges';
                            }
                            ?> 
                        </a></li>
                        <li><a class="subMenuLinkBlock" href="../controler/content.php?page=favorites"> 
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['mesFav']; 
                            }
                            else 
                            {
                                echo 'Mes favoris';
                            }
                            ?> 
                        </a></li>
                        <li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_houses&userId=<?php echo $_SESSION['userId']?>" > 
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['mesMais']; 
                            }
                            else 
                            {
                                echo 'Mes maisons';
                            }
                            ?> 
                        </a></li>
                        <li><a class="subMenuLinkBlock" href="../controler/content.php?page=formHouse" > 
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['ajoutMais']; 
                            }
                            else 
                            {
                                echo 'Ajouter une maison';
                            }
                            ?> 
                        </a></li>
			
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_mp" > 
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['messPriv']; 
                            }
                            else 
                            {
                                echo 'Messages privés';
                            }
                            ?> 
                        </a></li>
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=parameters" > 
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['param']; 
                            }
                            else 
                            {
                                echo 'Paramètres';
                            }
                            ?> 
                        </a></li>
		</ul>
            <?php } ?>
	</li>

	<li class="subMenuDisplayer" <?php if(!isset($_SESSION['userId'])){ echo 'style="width:25%"'; }?> >
            <a class="linkBlock" href="#help">
                Aide
            </a>
            <ul class="subMenuBlockList">
            <li><a class="subMenuLinkBlock" href="../controler/content.php?page=faq" >
                    FAQ
            </a></li>
            <li><a class="subMenuLinkBlock" href="../controler/content.php?page=guide" >
                    Guide d'utilisation du site
            </a></li>
            <li><a class="subMenuLinkBlock" href="../controler/content.php?page=contact" >
                    Contactez-nous
            </a></li>
            </ul>
        </li>
        
 

</ul>

</nav>