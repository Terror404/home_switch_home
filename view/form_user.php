<?php 
    if(!isset($_SESSION['userId']))
    {
?>}
<script language="JavaScript">
    function validation(f) {
  if (f.pass.value == '' || f.repass.value == ''|| f.mail.value == ''|| f.pseudo.value == '') {
    alert('Tous les champs obligatoires ne sont pas remplis');
    f.pass.focus();
    return false;
    }
  else if (f.pass.value != f.repass.value) {
    alert('Ce ne sont pas les mêmes mots de passe!');
    f.pass.focus();
    return false;
    }
  else if (f.pass.value == f.repass.value) {
    return true;
    }
  else {
    f.pass.focus();
    return false;
    }
  }
</script>

            <div class="position">
                <h1 class="Title"> <?php echo $_SESSION['creCompt']; ?> </h1> </br>
		<form method="post" action="content.php?page=confirmAddUser" onsubmit="return validation(this)" class="form">
			<p>
                            <label for="pseudo" >Pseudo*</label>
				<input type="text" name="pseudo" id="pseudo" placeholder="Ex:Doge92" maxlenght="12" />
			</p>
                        
			<p>
				<label for="pass">Mot de Passe*</label>
				<input type="password" name="pass" id="pass" />
			</p>
		
		
		
			<p>
				<label for="repass">Répéter le mot de passe*</label>
				<input type="password" name="repass" id="repass" />
			</p>
		
		
		
			<p>
				<label>Date de naissance</label>  
                                <input type="date" name="date" id="DatedeNaissance" placeholder="JJ/MM/AAAA" />
			</p>
		

		
			<p>
				<label>Adresse E-mail*</label>  
                                <input type="email" name="mail" id="Adressemail" placeholder="Ex:wowsuchadress@gmail.com" />
			</p>
		

		
			<p>
				<label for="telephone">Téléphone<input type="tel" name="tel" id="tel" placeholder="Ex:0000000000" maxlength="10" />
			</p>
                        <p><input type="hidden" mame="idmsg" value="2"></p>
		

			
		
                        </br>
		<p> 
                    <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['chamOblig']; 
                            }
                            else 
                            {
                                echo '*Champs obligatoires';
                            }
                            ?>  
                </p>

               <div class="twosubs">
                        <input type="hidden" name="addUser" value="1" />
			<input type="submit" name="valider" value="Valider" class="sub" />
		
			<input type="reset" name="annuler" value="Annuler" class="sub"/>
                </div>
		</form>
 </div>
<?php
    }
    else
    {
?>
        <div class="MsgErrorInsc">
        <br/><br/> <?php echo $_SESSION['pasAccedPag']; ?> <br/>
        <input type="button" value="Retour" onclick="self.location.href='content.php?page=home'" class="homeButton"/>
        </div>
    <?php }

if(isset($end) AND isset($_POST['addUser']) AND isset($_POST['addUser'])==1)
{if ($end==0) 
    {
        echo "Tout va bien";
    }
    elseif ($end==1)
    {
        echo "Ce ne sont pas les mêmes mots de passe!";
    }
    elseif ($end==2)
    {
        echo "Tous les champs obligatoires ne sont pas remplis!";
    }
}  
