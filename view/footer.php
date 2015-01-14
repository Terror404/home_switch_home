
	
        <ul>
            <div class="colonne1" style="float:left";>
            <li>
                <br/>
                <a href=# class="titre_colonne_1"> 
                    <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['aPropoNou']; 
                            }
                            else 
                            {
                                echo 'A propos de nous';
                            }
                            ?> 
                </a>
                
                <br/>
                <br/>
                
                    <a href=# class="footerLink"> 
                        <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['quiSomNou']; 
                            }
                            else 
                            {
                                echo 'Qui sommes-nous?';
                            }
                            ?> 
                    </a><br/>
                    <a href=# class="footerLink"> 
                        <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['contactNou']; 
                            }
                            else 
                            {
                                echo 'Contactez nous';
                            }
                            ?> 
                    </a><br>
                    <a href=# class="footerLink"> 
                        <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['infoLeg']; 
                            }
                            else 
                            {
                                echo 'Informations légales';
                            }
                            ?> 
                    </a><br/>
                    <a href=# class="footerLink"> 
                        <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['partenair']; 
                            }
                            else 
                            {
                                echo 'Nos partenaires';
                            }
                            ?> 
                    </a>
                
            
            </li>
            </div>
            
            <div class="colonne2" >
                
                <br/>
                <li><a href=# class="titre_colonne_2"> 
                    <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['decouvrHSH']; 
                            }
                            else 
                            {
                                echo 'Découvrez l\'\aventure HSH!';
                            }
                            ?> 
                    </a>
            
                <br/>
                <br/>
                    <a href=# class="footerLink"> 
                        <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['meilleurAnnonc']; 
                            }
                            else 
                            {
                                echo 'Nos meilleures Annonces';
                            }
                            ?> 
                    </a><br/>
                    <a href=# class="footerLink"> 
                        <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['anoncRecent']; 
                            }
                            else 
                            {
                                echo 'Nos annonces récentes';
                            }
                            ?> 
                    </a><br/>
                    <a href=# class="footerLink"> 
                        <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['notrForum']; 
                            }
                            else 
                            {
                                echo 'Notre Forum';
                            }
                            ?> 
                    </a>
                
            
            </li>
            </div>
            
            <div class="colonne3" style="float:right">
            <li>
                <br/>
                <a href=# class="titre_colonne_3" >
                    <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['suivezNouResSoc']; 
                            }
                            else 
                            {
                                echo 'Suivez nous sur les réseaux sociaux';
                            }
                            ?>>
                </a>
                
                <br/>
                <br/>
                    
                    <a href=https://www.facebook.com/hshapp class="footerLink">Facebook</a><br/>
                    <a href=https://twitter.com/Hm_Swtch_Hm class="footerLink">Twitter</a><br/>
                    <a href=http://instagram.com/homeswitchhomeweb/ class="footerLink">Instagram</a><br/>
                   
                
                
            </li>
            </div>
        
        </ul>
