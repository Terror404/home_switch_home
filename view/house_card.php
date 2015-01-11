 


<script type = "text/javascript">
			function hideshowhousetxt()
			{
			document.getElementById("housetxt").style.display="block";
			document.getElementById("ownerinfo").style.display="none";
			document.getElementById("mapblock").style.display="none";
			}
			function hideshowownerinfo()
			{
			document.getElementById("housetxt").style.display="none";
			document.getElementById("ownerinfo").style.display="block";
			document.getElementById("mapblock").style.display="none";
			}
			function hideshowmapblock()
			{
			document.getElementById("housetxt").style.display="none";
			document.getElementById("ownerinfo").style.display="none";
			document.getElementById("mapblock").style.display="block";
			}
			
		</script>
                
<section class='MiddlePage'>
    
    <article class='title'> <!-- title of the house-->
        <?php
            while($resHtitle=$askHtitle->fetch())
                {
                    echo $resHtitle['title'];
                } 
        ?>
    </article>
    
    <article class="img"> <!-- Mettre ici les photos et les 2 boutons -->
                    <p> <!-- main image-->
                        <?php 
                            while ($resHpic=$askHpic->fetch())
                                {
                        ?>
                                    <img src="<?php echo $resHpic['pictures'] ?>" alt="photo maison" class="image1">
                        <?php
                            }
                        ?>
                    </p>
                    
                    
                    <div class="caroussel">
                        <div id="galerie">
                                <div class="fleche_droite"></div>
                                <div class="fleche_gauche"></div>

                                <div class="slider">

                                        <div id="images">
                                        <a href="#">
                                        <img src="..//view/pictures/search-background.jpg" class="piccar"/>
                                        </a>
                                        </div>
                                    <!--<div id="images">
                                        <a href="#">
                                        <img src="..//view/pictures/search-background.jpg" class="piccar"/>
                                        </a>
                                        </div>
                                    <div id="images">
                                        <a href="#">
                                        <img src="..//view/pictures/search-background.jpg" class="piccar"/>
                                        </a>
                                        </div>
                                    <div id="images">
                                        <a href="#">
                                        <img src="..//view/pictures/search-background.jpg" class="piccar"/>
                                        </a>
                                        </div>
                                    <div id="images">
                                        <a href="#">
                                        <img src="..//view/pictures/search-background.jpg" class="piccar"/>
                                        </a>
                                        </div> -->
                                </div>
                        </div>
                    </div>
            <div class="sub">
                    <!--Send to the exchange form-->
                    <?php
                        while($resIdOwner=$askIdOwner->fetch())
                        {
                            $idOwner=$resIdOwner['id_user'];
                        }
                        
                        if($_SESSION['userId']==$idOwner)
                        {
                            $idHouse=$_GET['id'];
                    ?>
                            <form method="post" action="../controler/content.php?page=confirm_delete_house">
                                <input type="hidden" name="idHouse" value="<?phpecho echo $idHouse?>"/>
                                <input type=submit value="Supprimer cette maison" class="sub"/>
                            </form>
                    <?php
                        }
                        else
                        {
                            $idHouse=$_GET['id'];
                    ?>
                            <form method="post" action="../controler/content.php?page=exchange">
                                <input type="hidden" name="idUser2" value="<?php echo $idOwner ?>"/>
                                <input type="hidden" name="idHouseU2" value="<?php echo $idHouse ?>"/>
                                <input type="submit" value="Proposer un échange pour cette maison" class="sub"/>
                            </form>
                    <?php
                        }
                    ?>
                            <br />
                    <!--Add as a favorite-->
                    <form method="post" action="../controler/content.php?page=confirm_favs">
                        <input type="hidden"  name="favs" value="1"/>
                        <input type="hidden" name="houseId" value="<?php echo $_GET['id'] ?>"/>
                        <input type="submit" value="Ajouter aux favoris" class="sub"/>
                    </form>
            </div>
            
    </article>

<section class="info">			
        <ul class="onglet"> 
                <li class="o" onclick="hideshowhousetxt()">description de la maison</li>
                <li class="o" onclick="hideshowmapblock()">localisation</li>
                <li class="o" onclick="hideshowownerinfo()">propriétaire</li>
        </ul>
    
    
        <div class="desc" id="housetxt" style="display: block">
                <?php
                           while($resHdesc=$askHdesc->fetch())
                                {
                ?>
                                    Description du bien : 
                                    </br>
                                    </br>
                                     <?php echo $resHdesc['description'] ?>
                <?php
                                }
                ?>          
            </br>
            </br>

            Informations sur le logement:
            </br>
            </br>
            Type : 
                <?php 
                    while ($resHtype=$askHtype->fetch())
                        {
                            echo $resHtype['house_type'];
                        }
                ?>
            </br>
            Capacité :
                <?php 
                    while($resHcapacity=$askHcapacity->fetch())
                        {

                            echo $resHcapacity['nbr_people'];?> personne(s)<?php
                        }
                ?>
            </br>
            Nombre de chambre : 
                <?php
                    while($resHbrnb=$askHbrnb->fetch())
                        {
                            echo $resHbrnb['nbr_room'];?> chambre(s)<?php
                        }
                ?>
            </br>
            Aménagements : 
            </br>
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
        </div>
        
        
        <div class="mapblock" id="mapblock" style="display: none"> 
            <p><img class="map" src="..//view/pictures/search-background.jpg" alt= "map"/> </p>
            <p class="desc">
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
            </p>  
        </div>

        <div class="ownerinfo" id="ownerinfo" style="display: none">	
            <p> huge problem when profil reminder is included</p>
                
	</div>
    
    
    
</section> <!-- end of info section-->



    <article class="annonces">annonces <!-- Mettre ici les dates -->
        <br/>
        <?php
            while($resDateB=$askDateB ->fetch()AND $resDateE=$askDateE ->fetch())
                {
                if ($resDateB!=NULL AND $resDateB!="" AND $resDateE!=NULL AND $resDateE!="")
                {
        ?>
                    du <?php echo $resDateB['date_begin'] ?> au <?php echo $resDateE['date_end']?> <br/>
        <?php
                }
                else
                {
                    echo"Aucune annonce de disponible";
                }
                }
        ?>
                    <input type="button" value="Ajouter une annonce" class="addAdButton" 
                           onclick="self.location.href='../controler/content.php?page=createAd&id=<?php echo$_GET['id']?>'"/><br/>
    </article>
<section class="comments">
    <?php
                    include"../view/commentary_bloc.php";
                ?>
			commentaires
			<div class="commentbox">
				<div class="commentauthor">
					<p>mei</p>
					<p> <img class="userimg" src="500full.jpg" alt= "map"/> </p>
				</div>
				
				<div class="comment">
					<p>incroyable</p>
					<p>
						"Set in a period that is both modern and nostalgic, the film creates a fantastic, yet strangely 
						believable universe of supernatural creatures coexisting with modernity. A great part of this sense comes from Oga's evocative 
						backgrounds, which give each tree, 
						hedge and twist in the road an indefinable feeling of warmth that seems ready to spring into sentient life."
					</p>
					<p>posté le :10/06/2012</p>
				</div>
			</div>
			
			<div class="commentbox">
				<div class="commentauthor">
					
					<p> <img class="userimg" src="satsuki.jpg" alt= "map"/> </p>
					<p>satsuki</p>
				</div>
				
				<div class="comment">
					<p>magique</p>
					<p>"Set in a period that is both modern and nostalgic, the film creates a fantastic, yet strangely 
						believable universe of supernatural creatures coexisting with modernity. A great part of this sense comes from Oga's evocative 
						backgrounds, which give each tree, 
						hedge and twist in the road an indefinable feeling of warmth that seems ready to spring into sentient life."</p>
					<p>posté le :28/04/2010</p>
				</div>
			</div>
		</section>    
</section>
			
