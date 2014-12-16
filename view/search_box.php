<div class="map">
            <img src="../view/pictures/France.png" alt="Carte"/>
        </div>
<article class="FormSearch">
	<p>	
        <form class="Date" action="content.php?page=search_result" method="post"> <!--Formuaire de choix de la date-->
			<?php $research= "";?>
                        <p> <label class="LabDate"> Quelles dates ? </label> </p>
			<p> date début :
				 <!--Menu déroulant jour début-->
        			        <input name="dateBegin" type="text" class="datepicker">
                                        <br/>
                                                    
				date de fin :
				  <!--Menu déroulant jour fin-->
					<input name="dateEnd" type="text"class="datepicker"> 
				</p>
                        
                                <p>
                                    
                                    Dans quel région partez vous?
                                    <select name="area" size="1">
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
                                        
                                        
                                        
                                        
                                        
                                    </select>
                                        
                                    
                                    
                                </p>
                  
                            <p>Type de logement: <br/>
                            
                            <select name="houseType" size="1">
                                <option value="villa">Villa
                                <option value="maison">Maison
                                <option value="appartement">Appartement
                                <option value="chalet">Chalet
                                <option value="residence">Résidence
                                <option value="moulin">Moulin
                                <option value="loft">Loft
                                <option value="chateau">Chateau
                                <option value="gite">Gîtes
                                                                
                            </select><br/>
                          
                            <p>
                            Nombre de personnes:<br/>
				  <!--Menu déroulant jour fin-->
				<input type="range" min="1" max="10" name="nbrPeople" value="1" oninput="document.getElementById('AfficheRangePeople').textContent=value" set="1"/>
                                <span id="AfficheRangePeople">1</span>
                            <br/>
                            
                        </p>
		 <!--Formulaire de choix du nombre de personnes-->
			
		
		  <!--Formulaire de choix des critères avancés-->
			
                        <p>
                            Nombre de chambres:<br/>
                        
                                <input type="range" name="nbrRooms" min="1" max="10" value="1" oninput="document.getElementById('AfficheRangeRoom').textContent=value" />
                                <span id="AfficheRangeRoom">1</span>
                        </p>
                        
                        <p>
                            Aménagement:<br/>
                            <input type="checkbox" name="garden"><label >Jardin</label><br/>
                            <input type="checkbox" name="cour" ><label >Cour</label><br/>
                            <input type="checkbox" name="coveredPool" ><label >Piscine couverte</label><br/>
                            <input type="checkbox" name="uncoveredPool" ><label >Piscine plein air</label><br/>
                            <input type="checkbox" name="garage"><label >Garage/parking</label><br/>
                            <input type="checkbox" name="disabledAccess" ><label >Accès handicapés</label><br/>
                            <input type="checkbox" name="allowedSmoker"><label >Fumeurs autorisés</label><br/>
                        </p>
                        
                        <p>
                            <input type="checkbox" name="allowedAnimals"><label >Animaux autorisés:</label><br/>
                            <input type="checkbox" name="dog"><label >Chien</label><br/>
                            <input type="checkbox" name="cat" ><label >Chat</label><br/>
                            <input type="checkbox" name="rats" ><label >Rongeur</label><br/>
                            <input type="checkbox" name="doge" ><label >Doge</label><br/>
                            <input type="checkbox" name="other" ><label >Autre</label><br/>
                        </p>
		
                            
                            
                            
		 <!--Bouton envoi formulaire recherche-->
                    <input type="submit" value="Rechercher" />
		</form>	
	</p>	
</article>
