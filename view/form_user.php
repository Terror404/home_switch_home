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
		<form method="post" action="content.php?page=confirmAddUser" onsubmit="return validation(this)">
			<p>
                            <label for="pseudo">Pseudo*</label>
				<input type="text" name="pseudo" id="pseudo" placeholder="Ex:Doge92" maxlenght="12" />
			</p>
                        
			<p>
				<label for="pass">Mot de passe*</label>
				<input type="password" name="pass" id="pass" />
			</p>
		
		
		
			<p>
				<label for="repass">Répéter mot de passe*</label>
				<input type="password" name="repass" id="repass" />
			</p>
		
		
		
			<p>
				<label>Date de naissance</label>  <input type="date" name="date" id="DatedeNaissance" placeholder="JJ/MM/AAAA" />
			</p>
		

		
			<p>
				<label>Adresse e-mail*</label>  <input type="email" name="mail" id="Adressemail" placeholder="Ex:wowsuchadress@gmail.com" />
			</p>
		

		
			<p>
				<label for="telephone">Téléphone</label>
				<input type="tel" name="tel" id="tel" placeholder="Ex:0000000000" maxlength="10" />
			</p>
		
		

			
		
		
		<p>*Champs obligatoires</p>

               
			<input type="submit" name="valider" value="Valider" class="bouton" />
		
			<input type="reset" name="annuler" value="Annuler" class="bouton"/>
                
		</form>
 </div>
<?php
    }
    else
    {
?>
        <div class="MsgErrorInsc">
        <br/><br/>Vous ne pouvez pas accéder à cette page<br/>
        <input type="button" value="Retour" onclick="self.location.href='content.php?page=home'" class="homeButton"/>
        </div>

<?php
    }