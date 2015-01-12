 <div class="CoBloc3">
 <div class="CoBlocPic"><img src="<?php echo $_SESSION['userPic'];?>" alt="photo de profil" width=52 height=52 /></div>
 <div class="CoBlocLog"><?php echo 'Bienvenue '.$_SESSION['userLogin']?></div><br/>
 <a class="sessionDestruct" href='../view/session_destruct.php'>Se déconnecter</a> <br/>
<input class="quickMp" type="button" onclick="self.location.href='../controler/content.php?page=my_mp'" value="✉" />
<input class="blocCoAdd" type="button" onclick="self.location.href='../controler/content.php?page=formHouse'" value="+" style="
    position: absolute;
    top: 0;
    right: 15%;
    font-size:100%;
    width:10%;
    height:32%;"/>
<?php
if($_SESSION['userAccess']==='3')
{
    echo '<a class="CoBlocBO" href=\'../controler/back_office.php?page=index\' style="position:absolute;
    bottom:5%;
    right:22%;">Back Office </a>';
}

?>
 </div>
