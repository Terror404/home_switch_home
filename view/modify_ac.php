                    <section class='MiddlePage'>
                        <section class="RightCol">
                            <article class='title'>
                                <?php
                                    while($resAtitle=$askAtitle->fetch())
                                        {
                                            echo $resAtitle['title'];
                                        } 
                                ?>
                            </article>
                            <article class="PhotosButtons"> <!-- Mettre ici les photos et les 2 boutons --> 
                                            <div class='Photos'>
                                                <?php 
                                                    while ($resHpic=$askHpic->fetch())
                                                        {
                                                ?>
                                                            <img src="<?php echo $resHpic['pictures'] ?>" alt="photo maison" class="Hpic">
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        <div class='BD'>

                                            <div class="Dates"> <!-- Mettre ici les dates -->
                                                <?php
                                                    while($resDateB=$askDateB ->fetch()AND $resDateE=$askDateE ->fetch())
                                                        {
                                                ?>
                                                            <form action='../modele/update_ad_card.php' method="post" id='datead'>
                                                                <label for='modif_dateB'>Date :</label>
                                                                du <input type='date' name='modif_dateB' value="<?php echo $resDateB['date_begin'];?>" class='typedate' /> au <input type="date" name="modif_dateE" value="<?php echo $resDateE['date_end'];?>" class='typedate' />
                                                                <input type='submit' value="Modifier" />
                                                            </form> <br/>

                                                <?php
                                                        }
                                                ?>
                                            </div>

                                            <br/>
                                            <div class="Buttons">
                                                    <input type="button" name="DatePick" value="Sauvegarder" onclick="self.location.href='test n3bis.html'" style="width:130px" /> <!--Menu déroulant avec les dates possibles ???-->
                                                            <br />
                                                    <input type="button" name="SaveHouse" value="Fiche maison" onclick="self.location.href='test n3bis.html'" style="width:130px" /> <!-- Javascript ou PHP ici ?? -->
                                            </div>

                                        </div>
                            </article>


                            <article class="DescriptionMM"> <!--Mettre ici la description de la maison-->
                                <div class="txt">
                                    <?php
                                                while($resAdesc=$askAdesc->fetch())
                                                    {
                                    ?>
                                                        <p> Description du bien : <?php echo $resAdesc['description'] ?></p>
                                    <?php
                                                    }
                                    ?>          
                                </div>
                            </article>
                            <article class='Hinformation'>
                            <div class='txt'>
                                
                                <div class='otherI'>
                                <h3>Localisation :</h3>
                                Region : <br/>
                                Ville : <br/>
                                Code postal: <br/>

                                <h3>Informations sur le logement</h3>
                                Type : <br/>
                                Capacité : <br/>
                                Nombre de chambre : <br/>
                                Aménagements : <br/>

                                <h3>Demandes spécifiques à l'annonce</h3>
                                <label for="criteria1">Critère n.1 :</label> 
                                <select name="criteria1" id="criteria1">
                                    <option value="nonSmoker"> non fumeur
                                    <option value="noPet"> pas d'animaux
                                    <option value='feedPet'> nourrir des animaux
                                </select>
                                <textarea name="txtCrit1"> Mettre ce que contient la bdd</textarea>
                                <br/>
                                
                                <label for="criteria1">Critère n.2 :</label> 
                                <select name="criteria2" id="criteria2">
                                    <option value="nonSmoker"> non fumeur
                                    <option value="noPet"> pas d'animaux
                                    <option value='feedPet'> nourrir des animaux
                                </select>
                                <textarea name="txtCrit2"> Mettre ce que contient la bdd</textarea>
                                <br/>
                                
                                <label for="criteria1">Critère n.3 :</label> 
                                <select name="criteria3" id="criteria3">
                                    <option value="nonSmoker"> non fumeur
                                    <option value="noPet"> pas d'animaux
                                    <option value='feedPet'> nourrir des animaux
                                </select>
                                <textarea name="txtCrit2"> Mettre ce que contient la bdd</textarea>

                                </div>

                            </div>
                            </article>

                        </section>


                        <section class="LeftCol">
                            <div class="RapProf"> <!--Rappel du profil du membre-->
                            <?php   include '../ProfileReminder/profile_reminder_controleur.php'; ?>
                            </div>
                            
                            <div class='rating'>
                                    <?php
                                                while ( $resHrate=$askHrate->fetch())
                                                    { 
                                    ?>
                                                        <br/> Note : <?php echo $resHrate['rating'] ?> /10
                                    <?php
                                                    }
                                    ?>
                            </div>
                        </section>      
                    </section>

			