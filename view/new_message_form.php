		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script> <!-- nice edit -->
		<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<?php
include ('mailbox_toolbar.php');
?>
		<section class="newmsg"> 
			<div class="navnewmgs">
				<ul class="listehz">
					<li><input type ="submit" value="Annuler"/></li>
					<li><input type ="reset" value="Supprimer"/></li>
				</ul>
			</div>
		
			<div class="newmsgform" >
                            <form method=post action="../controler/content.php?page=confirmAddMsg" class="form-horizontal">
					<p>
						<label> à:</label>
						<input class= "champ" type="text" name="login_receiver"/>
							
					
					</p>
					<p>
						<label> titre: </label>
						<input class= "champ" type="text" name="title"/>
					</p>
					
						<label> Message: </label>
						<textarea name="text"></textarea>
					</p>
					
                                        <p><input class="button" type ="submit" value="Envoyer"/></p>                                      
				</form>
			</div>
		</section>



<?php> //"../modele/add_message.php" <?>