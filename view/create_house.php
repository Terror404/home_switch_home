<section class="RightCol">
    <h1 class="Title"> <?php echo $_SESSION['ajoutResid']; ?> </h1> </br>
    <div class="form"> 
        <form action="../controler/content.php?page=confirmAddHouse"  method="post" id="create_house" enctype="multipart/form-data" class="formHouseBox">
        <div class='title'> <!--Insert the title-->
            <p class="label">Titre pour votre maison </p>
            <input type="text" name="title" placeholder="titre de la maison" onblur="verifform(this)"/>
        </div>
        <div class="PhotosButtons"> <!--Insert the photos-->
                <div class="PhotosMM"> 
                        <p> 
                            <label for="photo0" class="label">photo principale:</label>
                            <input name="photo0" type='file' id="photo0" /><br/>
                            <input type="hidden" name="tagPhoto" value="0"/>
                            
                            <label for="photo1" class="label">photo n°2:</label>
                            <input name="photo1" type='file' id="photo1" /><br/>  
                            <input type="hidden" name="tagPhoto" value="1"/>
                            
                            <label for="photo2" class="label">photo n°3:</label>
                            <input name="photo2" type='file' id="photo2" /><br/>  
                            <input type="hidden" name="tagPhoto" value="1"/>
                            
                            <!--<label for="photo3" class="label">photo n°4:</label>
                            <input name="photo3" type='file' id="photo3" /><br/>  
                            <input type="hidden" name="tagPhoto" value="1"/>
                            
                            <label for="photo4" class="label">photo n°5:</label>
                            <input name="photo4" type='file' id="photo4" /><br/>  
                            <input type="hidden" name="tagPhoto" value="1"/>
                            
                            <label for="photo5" class="label">photo n°6:</label>
                            <input name="photo5" type='file' id="photo5" /><br/>  
                            <input type="hidden" name="tagPhoto" value="1"/>
                            
                            <label for="photo6" class="label">photo n°7:</label>
                            <input name="photo6" type='file' id="photo6" /><br/>  
                            <input type="hidden" name="tagPhoto" value="1"/>-->
                                                 
                           
                        </p>
                </div>
        </div>

        <br/>
        <div class="DescriptionMM" > <!--Mettre ici la description de la maison-->
            <p class="txt">
                <label for="description" class="label">décrivez votre habitation:</label>
                <textarea class="textarea" name="description" placeholder="Description "></textarea>
            </p>
        </div>
        <div class='Hinformation'>
        <div class='txt'>
            <h3>Localisation :</h3>
                <!--Region-->
                <label for="region" class="label">Région :</label>
                <select name="region" id="region"> 
                        <option value="alsace">Alsace
                        <option value="aquitaine">Aquitaine
                        <option value="auvergne">Auvergne
                        <option value="basse_normandie">Basse-Normandie
                        <option value="bretagne">Bretagne
                        <option value="champagne_ardenne">Champagne-Ardenne
                        <option value="corse">Corse
                        <option value="franche_comté">Franche-Comté
                        <option value="guadeloupe">Guadeloupe
                        <option value="guyane">Guyane
                        <option value="haute_normandie">Haute-Normandie
                        <option value="idf">Île-de-France
                        <option value="la_reunion">La Réunion
                        <option value="languedoc_roussillon">Languedoc-Roussillon
                        <option value="lorraine">Lorraine
                        <option value="martinique">Martinique
                        <option value="mayotte">Mayotte
                        <option value="midi_pyrenees">Midi-Pyrénées
                        <option value="NPdC">Nord-Pas-de-Calais
                        <option value="PdlL">Pays de la Loire
                        <option value="picardie">Picardie
                        <option value="poitou_charentes">Poitou Charentes
                        <option value="PACA">Provence Alpes Côte d'Azur
                        <option value="rhone_alpes">Rhône-Alpes
                 </select><br/>

                <!--ZipCode-->
                <label for='zipcode' class="label">Code Postal :</label>
                <input type='number' name='zipcode' id='zipcode' /><br/>

                <!--Town-->
                <label for="town" class="label"> Ville : </label>
                <input type="text" name="town" id="town"/><p class="ville">Veuillez entrer le nom de la ville sans tirêts</p>

                <!--address-->
                <label for='address' class="label"> Adresse :</label>
                <input type='text' name='address' id='address'/>

            <h3>Informations sur le logement</h3>
                <!--Type-->
                <label class="label" > Type de logement :</label>
                <select id="type" name="house_type"> 
                        <option value="Non précisé">Choisissez votre type de logement</option>
                        <option value="Maison / Villa" title="Maison">Maison / Villa</option>
                        <option value="Appartement" title="Appartement">Appartement</option>                                                            
                        <option value="Chalet" title="Chalet">Chalet</option>
                        <option value="Corps de ferme" title="Fermette">Corps de ferme</option>
                        <option value="Moulin   " title="Moulin">Moulin</option>
                        <option value="Loft" title="Loft">Loft</option>
                        <option value="Mobil-Home" title="Mobil-Home">Mobil-Home</option>
                        <option value="Château" title="Château">Château</option>
                        <option value="Gîtes / Chambre d'Hôtes" title="Chambres d’Hôtes">Gîtes/Chambres d’Hôtes</option>
                </select><br/>

                <!--Capacity-->
                <label class="label">Capacité :</label>
                <input type="number" name="capacity" id="capacity" />
                <br/>

                <!--BRnb-->
                <label class="label">Nombre de chambre :</label>
                <input type="number" name="brnb" id="brnb" />
                <br/>

                <!--Facilities-->
                <h3> Aménagements :</h3>
                
                         <?php
                         
                            while($resSearchBoxCriteriaHouse=$askSearchBoxCriteriaHouse->fetch())
                            {
                                echo '<input type="checkbox" name="'.$resSearchBoxCriteriaHouse['name'].'"><label >'.$resSearchBoxCriteriaHouse['real_name'].'</label><br/>';
                            }
                            ?>
                        
        </div>
        </div>
    <input type="submit" value="Envoyer le formulaire" class="sub"/>
    </form>
    </div>
        
</section>
    
