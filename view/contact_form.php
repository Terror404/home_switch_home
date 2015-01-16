

		<title>Contactez-nous</title>

                
   		<script type="text/javascript">

<!--  //          
   function verif(LeForm){
      var pseudo = LeForm.pseudo.value;
      var mail = LeForm.mail.value;
      var sujet = LeForm.sujet.value;
      var message = LeForm.message.value;
      
      var on_envoie = true;
      
      if((pseudo == "")||(pseudo == "null")){
         alert ("Veuillez entrer un pseudo");
         on_envoie = false;
         }
         
      if ((mail == "")||(mail == "null")||(mail.indexOf("@") == -1)){
         alert("Veuillez entrer une adresse mail");
         on_envoie = false;
         }
         
      if((sujet == "")||(sujet == "null")){
         alert ("Veuillez indiquer le sujet de votre message");
         on_envoie = false;
         }
         
      if((message == "")||(message == "null")){
         alert ("Veuillez entrer votre message");
         on_envoie = false;
         }
         
      if(on_envoie){
         LeForm.submit();
         }
   }

		//-->
  		 </script>

        <div class='position'>       
        <h1 class='Title'>Contact</h1>
        <br>
            
        <div class='txt'>
         <h4>Vous pouvez joindre HomeSwitchHome à tout moment, et ce par différents moyens :</h4>
         <ul>
            <li class="liste">
               Par courriel :
               <a href="mailto:homeswhitchhome@outlook.fr">homeswitchhome@outlook.fr</a>
            </li>
            <li class="liste">
               Par téléphone :
               <a href="tel:+33601326784">06.01.32.67.84</a>
            </li>
            <li class="liste">
               Par courriel postal :
               HomeSwitchHome - 25 Avenue de Breteuil - 75007 Paris - France
            </li>
         </ul>
         </br>

         <h4>Vous pouvez également utilisez ce formulaire pour entrer en contact avec nous.</h4>
        </div>
        <br>

         <form id='contact' method="post" action="send_contact.php" class='form'>
			

                  <p>
                      <label for=pseudo>Pseudo :</label>
                      <input class="input" type="text" name="pseudo" size="30" maxlength="150" placeholder="Veuillez entrer votre pseudo"/></p>

                  </p>
                  
                  <p>    
                      <label for='mail'>Mail :</label>
                      <input class="input" type="text" size="60" maxlength="300" name="mail" placeholder="Veuillez indiquer votre mail"/></p>

                  </p>
                        
                  <p>
                      <label for="sujet">Sujet :</label>
                      <input class="input" type="text" name="sujet" size="60" maxlength="150" placeholder="Veuillez indiquer le sujet de votre message"/></p>

                  </p>
                 
                  <br>
                  <p>
                      <label for="message">Votre message :</label>
                      <textarea name="message" rows="10" cols="60" placeholder="Veuillez entrer votre message"></textarea>
                  </p>

                  <br>
                  
                  <div class='twosubs'>
                        
                      <input name="annuler" type="reset" value="Annuler" class='sub'/> 
                      <input type="button" value="Envoyer" onClick="verif(this.form)" class='sub'/>
                      
                  </div>

         </form>


        </body>
</html>    
