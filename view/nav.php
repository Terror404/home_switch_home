<?php if(isset($_SESSION['userId']))
{
    $userId=$_SESSION["userId"];
?>
<nav>

<ul class="linkBlockList">
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=home" > <?php echo $_SESSION['accueil']; ?> </a></li>
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=forumIndex" >Forum</a></li>
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=research" > <?php echo $_SESSION['rech']; ?> </a></li>
	<li class="subMenuDisplayer">
		<a class="linkBlock" href="">Mon Compte</a>
		<ul class="subMenuBlockList">
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=myProfile&userId=<?php echo $userId?>" > <?php echo $_SESSION['monProf']; ?> </a></li>
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_exchanges" > <?php $_SESSION['mesEch']; ?> </a></li>
                        <li><a class="subMenuLinkBlock" href="../controler/content.php?page=favorites"> <?php $_SESSION['mesFav']; ?> </a></li>
                        <li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_houses&userId=<?php echo $userId?>" > <?php echo $_SESSION['mesMais']; ?> </a></li>
                        <li><a class="subMenuLinkBlock" href="../controler/content.php?page=formHouse" > <?php $_SESSION['ajoutMais']; ?> </a></li>
			
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=my_mp" > <?php echo $_SESSION['messPriv']; ?> </a></li>
			<li><a class="subMenuLinkBlock" href="../controler/content.php?page=parameters" > <?php echo $_SESSION['param']; ?> </a></li>
		</ul>
	</li>
	<li class="subMenuDisplayer"><a class="linkBlock" href="#help">Aide</a>
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
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=home" >Accueil</a></li>
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=forumIndex" >Forum</a></li>
	<li class="linkBlockElement"><a class="linkBlock" href="../controler/content.php?page=research" >Recherche</a></li>
	<li class="linkBlockElement"><a class="linkBlock" href="#help">Aide</a>
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
