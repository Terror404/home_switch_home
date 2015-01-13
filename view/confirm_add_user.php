
        <div class="confirmAddUserButton">
                            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['profCree']; 
                            }
                            else 
                            {
                                echo 'Votre profil a bien été créé';
                            }
                            ?>
    <br/>
    <input type="button" onclick="self.location.href='../controler/content.php?page=research'" name="continuer" value="Continuer" />
        </div>
       
