 <div class="CoBloc3">
 <div class="CoBlocPic"><img src="<?php echo $_SESSION['userPic'];?>" alt="photo de profil" /></div>
 <div class="CoBlocLog"><?php echo $_SESSION['userLogin']?></div><br/>
 <a href='../view/session_destruct.php'>Se déconnecter</a> <br/>
<input class="quickMp" type="button" onclick="self.location.href='../controler/content.php?page=my_mp'" value="✉" />
 </div>
