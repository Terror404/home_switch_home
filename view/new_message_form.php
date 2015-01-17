		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script> <!-- nice edit -->
		<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
              

<?php
include ('mailbox_toolbar.php');
?>
                <h2 class="title"> Nouveau Message </h2>
		<section class="newmsg"> 
                    
			<div class="newmsgform" >
                            <form method=post action="../controler/content.php?page=confirmAddMsg" class="form-horizontal">
					<p>
						<label> à:</label>
						<input class= "champ" type="text" name="login_receiver"/>
							
					
					</p>
					<p>
						<label> Titre: </label>
						<input class= "champ" type="text" name="title"/>
					</p>
					
						<label> Message: </label>
						<textarea class="textarea" name="text"></textarea>
					</p>
                                        
                                        <p class="twosubs">
                                                <input class="sub" type ="reset" value="Annuler"/>
                                                <input class="sub" type ="submit" value="Envoyer"/>
                                        </p>   
                                        
				</form>
			</div>
		</section>


