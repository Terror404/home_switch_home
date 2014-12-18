<?php $userId=$_SESSION["userId"];?>
<nav>

<ul class="linkBlockList">
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=home" >Accueil</a></li>
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=forumIndex" >Forum</a></li>
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=research" >Recherche</a></li>
	<li class="subMenuDisplayer">
		<a class="linkBlock" href="">Mon Compte</a>
		<ul class="subMenuBlockList">
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=myProfile&userId=<?php echo $userId?>" >Mon profil</a></li>
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_ads&userId=<?php echo $userId?>" >Mes annonces</a></li>
                        <li><a class="subMenuLinkBlock" href="../controler/content.php?page=formAd">Ajouter une annonce</a></li>
                        <li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_houses&userId=<?php echo $userId?>" >Mes maisons</a></li>
                        <li><a class="subMenuLinkBlock" href="../controler/content.php?page=formHouse" >Ajouter une maison</a></li>
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_research&userId=<?php echo $userId?>" >Favoris</a></li>
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_mp" >Messages privés</a></li>
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=parameters" >Paramètres</a></li>
		</ul>
	</li>
	<li class="linkBlockElement"><a class="linkBlock" href="#help">Aide</a></li>
</ul>
    
</nav>
