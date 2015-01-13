<?php if(isset($_SESSION['userId']))
{
    $userId=$_SESSION["userId"];
?>
<nav>

<ul class="linkBlockList">
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=home" >
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['accueil']; 
                            }
                            else 
                            {
                                echo 'Répéter le mot de Passe*';
                            }
                            ?>  
            </a></li>
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=forumIndex" >Forum</a></li>
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=research" > 
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
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=myProfile&userId=<?php echo $userId?>" > 
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
                        <li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_houses&userId=<?php echo $userId?>" > 
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
	</li>
	<li class="subMenuDisplayer"><a class="linkBlock" href="#help"><?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['aid']; 
                            }
                            else 
                            {
                                echo 'Aide';
                            }
                            ?>
        </a></li>
        <ul class="subMenuBlockList">
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=myProfile&userId=<?php echo $userId?>" >FAQ</a></li>
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_ads&userId=<?php echo $userId?>" >Forum</a></li>
        </ul>
        
        </li>
</ul>
    
</nav>
<?php
}

else
{
?>
<nav>

<ul class="linkBlockList">
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=home" >
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['accueil']; 
                            }
                            else 
                            {
                                echo 'Accueil';
                            }
                            ?>
        </a></li>
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=forumIndex" >Forum</a></li>
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=research" >
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
	<li class="linkBlockElement"><a class="linkBlock" href="#help"><?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['aid']; 
                            }
                            else 
                            {
                                echo 'Aide';
                            }
                            ?>
        </a>
        <ul class="subMenuBlockList">
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=myProfile&userId=<?php echo $userId?>" >FAQ</a></li>
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_ads&userId=<?php echo $userId?>" >Forum</a></li>
        </ul>
        </li>
</ul>
    
</nav>
<?php
}
?>
