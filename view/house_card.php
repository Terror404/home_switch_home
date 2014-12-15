                    <section class='MiddlePage'>
                    <section class="RightCol">
                        <article class='title'>
                            <?php
                                while($resHtitle=$askHtitle->fetch())
                                    {
                                        echo $resHtitle['title'];
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
                                                        <img src="<?php echo $resHpic['pictures'] ?>" alt="photo maison" class="Hpic">
                                            <?php
                                                }
                                            ?>
					</p>
				<div class="ButtonMM">
					<input type="button" name="DatePick" value="Choisir une date" onclick="self.location.href='test n3bis.html'" style="width:130px" /> <!--Menu déroulant avec les dates possibles ???-->
						<br />
					<input type="button" name="SaveHouse" value="Sauvegarder" onclick="self.location.href='test n3bis.html'" style="width:130px" /> <!-- Javascript ou PHP ici ?? -->
				</div>
				</aside>
			</article>
                        
		
			<article class="DescriptionMM"> <!--Mettre ici la description de la maison-->
                            <div class="txt">
                                <?php
                                            while($resHdesc=$askHdesc->fetch())
                                                {
                                ?>
                                                    <p> Description du bien : <?php echo $resHdesc['description'] ?></p>
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
                            <br/><h3>Localisation : </h3>
                            Region : 
                                <?php 
                                    while ($resHregion=$askHregion->fetch())
                                        {
                                            echo $resHregion['real_name'];
                                        }
                                ?><br/>
                            Ville : 
                                <?php
                                    while ($resHtown=$askHtown->fetch())
                                        {
                                            echo $resHtown['ville_nom_reel'];
                                        }
                                ?><br/>
                            Code postal: 
                                <?php
                                    while ($resHzip=$askHzip->fetch())
                                        {
                                            echo $resHzip['ville_code_postal'];
                                        }
                                ?><br/>
                            Adresse :
                                <?php
                                    while ($resHaddress=$askHaddress->fetch())
                                        {
                                            echo $resHaddress['address'];
                                        }
                                ?>
                            
                            <br/><br/><h3>Informations sur le logement</h3>
                            Type : 
                                <?php 
                                    while ($resHtype=$askHtype->fetch())
                                        {
                                            echo $resHtype['house_type'];
                                        }
                                ?><br/>
                            Capacité :
                                <?php 
                                    while($resHcapacity=$askHcapacity->fetch())
                                        {
                                        
                                            echo $resHcapacity['nbr_people'];?> personne(s)<?php
                                        }
                                ?><br/>
                            Nombre de chambre : 
                                <?php
                                    while($resHbrnb=$askHbrnb->fetch())
                                        {
                                            echo $resHbrnb['nbr_room'];?> chambre(s)<?php
                                        }
                                ?><br/>
                            Aménagements : 
                                <?php
                                    while($resHfac=$askHfac->fetch())
                                        {
                                            echo $resHfac['facilities'];
                                        }
                                ?>
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
			