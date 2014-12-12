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
		
		<form method="post" action="content.php?page=confirmAddUser" onsubmit="return validation(this)">
			<p>
				<label>Nom</label> : <input type="text" name="nom" id="Nom" placeholder="Ex:Hasselhof" />
			</p>

			<p>
				<label>Prénom</label> : <input type="text" name="prenom" id="Prenom" placeholder="Ex:David" />
			</p>
		
		
		
			<p>
				<label>Date de naissance</label> : <input type="date" name="date" id="DatedeNaissance" placeholder="JJ/MM/AAAA" />
			</p>
		

		
			<p>
				<label>Adresse e-mail*</label> : <input type="email" name="mail" id="Adressemail" placeholder="Ex:dhasselhof@malibu.com" />
			</p>
		

		
			<p>
				<label for="telephone">Téléphone</label>
				<input type="tel" name="tel" id="tel" placeholder="Ex:0000000000" maxlength="10" />
			</p>
		
		</fieldset>

			<p>
				<label for="pseudo">Pseudo*</label>
				<input type="text" name="pseudo" id="pseudo" placeholder="Ex:Chabadou" maxlenght="12" />
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
				Sexe:<br />
				<input type="radio" name="homme" id="homme" /> <label for="homme">Homme</label><br />
				<input type="radio" name="femme" id="femme" /> <label for="femme">Femme</label><br />
				<input type="radio" name="autre" id="autre" /> <label for="autre">Autre</label><br />
			</p>
		

		
			<p>
				<label for="infos">Informations additionelles</label>
				<textarea name="infos" id="info" /></textarea>
			</p>
		
		
		<p>*Champs obligatoires</p>

		
			<input type="submit" name="valider" value="Valider" />
		
			<input type="reset" name="annuler" value="Annuler" />
		</form>
 