<!DOCTYPE html>
	<html>
		<head>
                    <link rel="stylesheet" href="css_house_card.css" />
                    <meta charset="utf-8">
                    <title> Fiche maison </title> 
		</head>
                
		<body>
                    <section class='MiddlePage'>
                    <section class="RightCol">
                        <article class='title'>
                            <?php
                                while($resHtitle=$askHtitle->fetch())
                                    {
                            ?>
                            <form action='modify_house_card.php' method="post" id='ModTitle'>
                                <label for='ModTitle'>Titre :</label>
                                <input type='text' name='ModTitle' value="<?php echo $resHtitle['title'];?>" />  
                                <input type='submit' value="Modifier" />
                            </form>
                            <?php
                                    } 
                            ?>
                        </article>
			<article class="PhotosButtons"> <!-- Mettre ici les photos et les 2 boutons -->
				<aside class="PhotosMM"> 
					<p>
                                            <?php 
                                                while ($resHpic=$askHpic->fetch())
                                                    {
                                            ?>
                                                        <img src="<?php echo $resHpic['pictures'] ?>" alt="photo maison 1" class="Hpic">
                                            <?php
                                                }
                                            ?>
					</p>
				</aside>
			</article>
                        
		
			<article class="DescriptionMM"> <!--Mettre ici la description de la maison-->
                            <div class="txt">
                                <?php
                                            while($resHdesc=$askHdesc->fetch())
                                                {
                                ?>
                                                <label for='modif_desc'>Description :</label>
                                                <form action='modify_house_card.php' method="post" id='modif_desc'>
                                                <textarea name='ModDesc' id='ModDesc'><?php echo $resHdesc['description'];?></textarea> 
                                                <input type='submit' value="Modifier" />
                            </form>   
                                <?php
                                            }
                                ?>   
                            </div>
			</article>
                        <article class='Hinformation'>
                        <div class='txt'>
                            <p class='rating'>
                                <?php
                                            while ( $resHrate=$askHrate->fetch())
                                                { 
                                ?>
                                                    <br/> Note : <?php echo $resHrate['rating'] ?> /10
                                <?php
                                                }
                                ?>
                            </p>
                            <div class='otherI'>
                            <h3>Localisation :</h3>
                                
                                <form action='modify_house_card.php' method="post" id='modif_localisation'>
                                    <label for='modif_region'>Region :</label>
                                    <select name="modif_region" id="modif_region">
                                                                <option value="00">Mettre le $ correspondant à la region</option>
								<option value="01" >Alsace</option>
								<option value="02" >Aquitaine</option>
								<option value="03" >Auvergne</option>
								<option value="04" >Basse-Normandie</option>
								<option value="05" >Bourgogne</option>
								<option value="06" >Bretagne</option>
								<option value="07" >Centre</option>
								<option value="08" >Champagne-Ardenne</option>
								<option value="09" >Corse</option>
				 				<option value="10" >Franche-Comté</option>
								<option value="11" >Haute-Normandie</option>
								<option value="12" >Ile-de-France</option>
								<option value="13" >Languedoc-Roussillon</option>
								<option value="14" >Limousin</option>
								<option value="15" >Lorraine</option>
								<option value="16" >Midi-Pyrénées</option>
								<option value="17" >Nord-Pas-de-Calais</option>
								<option value="18" >Pays de la Loire</option>
								<option value="19" >Picardie</option>
								<option value="20" >Poitou-Charentes</option>
								<option value="21" >Provence-Alpes-Côte d'Azur</option>
								<option value="22" >Rhône-Alpes</option>
								<option value="23" >Guadeloupe</option>
								<option value="24" >Martinique</option>
								<option value="25" >Guyane</option>
								<option value="26" >Réunion</option>
                                    </select> <br/>
                                
                                <!--Modify the town-->
                                    <label for='modif_town'>Ville :</label>
                                    <input type='text' name='modif_town' value="$ correspondant" />  
                                    <br/>
                                
                                <!--Modify the zipcode-->
                                    <label for='modif_zip'>Code postal :</label>
                                    <input type='number' name='modif_zip' value="0" />  
                                    <br/>
                                    
                                    <input type='submit' value="Modifier" />
                                </form>
                            
                            <h3>Informations sur le logement</h3>
                            <!--Modify the type-->
                            <form action='modify_house_card.php' method="post" id='modif_info'>
                                <label for='modif_type'>Type :</label>
                                <select id="modif_type" name="modif_type"> <!-- champs des types de logements simplifiées: partenaires-europréens.fr-->
                                                            <option value="00">Mettre le $ correspondant</option>
                                                            <option value="01" title="Maison / Villa">Maison / Villa</option>
                                                            <option value="02" title="Appartement">Appartement</option>
                                                            <option value="03" title="Immeuble">Immeuble</option>                                                            
                                                            <option value="04" title="Chalet">Chalet</option>
                                                            <option value="05" title="Fermette">Fermette</option>
                                                            <option value="06" title="Moulin">Moulin</option>
                                                            <option value="07" title="Loft">Loft</option>
                                                            <option value="08" title="Mobil-Home">Mobil-Home</option>
                                                            <option value="09" title="Château">Château</option>
                                                            <option value="10" title="Gîtes/Chambres d’Hôtes">Gîtes/Chambres d’Hôtes</option>
                                </select>
                                <br/>
                            
                            <!--Modify capacity-->
                                <label for='modif_cap'>Capacité :</label>
                                <input type='number' name='modif_cap' value="0" />  
                                <br/>
                            
                            <!--Modify number of chambers-->
                                <label for='modif_bed'>Nombre de chambre :</label>
                                <input type='number' name='modif_bed' value="0" />  
                                <br/>
                                    
                            <!--Modify facilities-->
                                <label for='modif_fac'>Aménagements :</label>
                                    <input type="checkbox"  value='00'/> <label> cour </label>
                                    <input type="checkbox"  value='01'/> <label> jardin</label>
                                    <input type="checkbox"  value='02'/><label> garage/ parking</label>
                                    <input type="checkbox"  value='03'/> <label> piscine </label>
                                    <input type="checkbox"  value='04'/> <label> accès handicapé</label>
                                    <input type="checkbox"  value='05'/> <label> fumeurs </label>
                                    <br/>

                                <input type='submit' value="Modifier" />
                            </form>
                            </div>
                        </div>
                        </article>
                        

			<article class="ComMM"> <!-- Mettre ici les commentaires -->
				<p class="TxtCom"> Liste de 3-4 commentaires (les mieux notés ??)
                                    <?php
                                        include"../CommentaryBloc/commentary_bloc_controleur.php";
                                    ?>				
			</article>
                    </section>
                    
		
                    <section class="LeftCol">
			<article class="RapProf"> <!--Rappel du profil du membre-->
			<?php   include '../ProfileReminder/profile_reminder_controleur.php'; ?>
			</article>
			
			<article class="DateMM"> <!-- Mettre ici les dates -->
                            <?php
                                while($resDateB=$askDateB ->fetch()AND $resDateE=$askDateE ->fetch())
                                    {
                            ?>
                                        du <?php echo $resDateB['date_begin'] ?> au <?php echo $resDateE['date_end']?> <br/>
                                        
                            <?php
                                    }
                            ?>
			</article>
                    </section>      
                    </section>
                </body>	
        </html>