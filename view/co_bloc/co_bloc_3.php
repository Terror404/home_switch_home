 <div class="CoBloc3">
 <div class="CoBlocPic"><img src="<?php echo $_SESSION['userPic'];?>" alt="photo de profil" width=52 height=52 /></div>
 <div class="CoBlocLog"><?php echo 'Bienvenue '.$_SESSION['userLogin']?></div><br/>
 <a class="sessionDestruct" href='../view/session_destruct.php'>Se déconnecter</a> <br/>
<input class="quickMp" type="button" onclick="self.location.href='../controler/content.php?page=my_mp'" value="✉" />
 </div>
