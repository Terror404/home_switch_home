<!DOCTYPE html>
<html>
    <head>
        <title>Nouvelle maison</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../HouseCard/css_create_hc.css" />
    </head>
    
    <body>
                <section class="RightCol">
                    <form action="../modele/add_house.php" method="post" id="create_house" enctype="multipart/form-data" onSubmit="">
                        <article class='title'> <!--Insert the title-->
                            <input type="text" name="title" placeholder="titre de la maison" onblur="verifform(this)"/>
                        </article>
			<article class="PhotosButtons"> <!--Insert the photos-->
				<aside class="PhotosMM"> 
					<p>     
                                            <input type='file' id="photo1" />                                    
					</p>
				</aside>
			</article>
                        
		
			<article class="DescriptionMM"> <!--Mettre ici la description de la maison-->
                            <p class="txt">
                                <textarea name="description" placeholder="Description de votre bien"></textarea>
                            </p>
			</article>
                        <article class='Hinformation'>
                        <div class='txt'>
                            <h3>Localisation :</h3>
                                <!--Region-->
                                <label for="region">Région :</label>
                                <select name="region" id="region"> <!--champ de régions du bon coin muhahaha -->
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
                                 </select><br/>
                                
                                <!--Town-->
                                <label for="town"> Ville : </label>
                                <input type="text" name="town" id="town"/><br/>
                                
                                <!--ZipCode-->
                                <label for='zipcode'>Code Postal :</label>
                                <input type='number' name='zipcode' id='zipcode' /><br/>
                                
                                <!--address-->
                                <label for='address'> Adresse :</label>
                                <input type='text' name='address' id='address'/>
                            
                            <h3>Informations sur le logement</h3>
                                <!--Type-->
                                <label> Type de logement :</label>
                                <select id="type" name="house_type"> <!-- champs des types de logements simplifiées: partenaires-europréens.fr-->
                                        <option value="00">Choisissez votre type de logement</option>
                                        <option value="01" title="Maison">Maison / Villa</option>
                                        <option value="02" title="Appartement">Appartement</option>
                                        <option value="03" title="Immeuble">Immeuble</option>                                                            
                                        <option value="04" title="Chalet">Chalet</option>
                                        <option value="05" title="Fermette">Fermette</option>
                                        <option value="06" title="Moulin">Moulin</option>
                                        <option value="07" title="Loft">Loft</option>
                                        <option value="08" title="Mobil-Home">Mobil-Home</option>
                                        <option value="09" title="Château">Château</option>
                                        <option value="10" title="Chambres d’Hôtes">Gîtes/Chambres d’Hôtes</option>
                                </select><br/>
                                
                                <!--Capacity-->
                                <label>Capacité :</label>
                                <input type="number" name="capacity" id="capacity" />
                                <br/>
                                
                                <!--BRnb-->
                                <label>Nombre de chambre :</label>
                                <input type="number" name="brnb" id="brnb" />
                                <br/>
                                
                                <!--Facilities-->
                                <label>Aménagements :</label>
                                    <input type="checkbox"/> <label> cour </label>
                                        <input type="checkbox" value="garden"/> <label> jardin</label>
                                        <input type="checkbox" value="parking"/> <label> garage/ parking</label>
                                        <input type="checkbox" value="pool"/> <label> piscine </label>
                                        <input type="checkbox" value="disabled"/> <label> accès handicapé</label>
                        </div>
                        </article>
                        <input type="submit" value="Envoyer le formulaire" class="sub"/>
                    </form>
                    </section>
                    
		
                    <section class="LeftCol">
			<article class="RapProf"> <!--Rappel du profil du membre-->
			<?php   include '../view/profile_reminder.php'; ?>
			</article>
			
                    </section>
        <?php include"verf_H_form.php" ?>
    </body>
</html>