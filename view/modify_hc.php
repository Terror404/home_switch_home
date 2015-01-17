 


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
<br/>
<br/>
<section class='MiddlePage'>
    
    <article class='title'> <!-- title of the house-->
        <form method="post" action="">
        <?php
            while($resModHouse=$askModHouse->fetch())
                {
            ?>
                    <input type="text" name="title" value="<?php echo $resModHouse['title']?>"/>
            <?php
                } 
        ?>
            <input type="submit" name="Modifier"/>
            <input type="reset" name="Annuler"/>
        </form>
    </article>
     <article class="img"> <!-- Mettre ici les photos et les 2 boutons -->
                    <p> <!-- main image-->
                        <?php 
                            while ($resModHouse=$askModHouse->fetch())
                                {
                        ?>
                                    <img src="<?php echo $resModHouse['pictures'] ?>" alt="photo maison" class="image1">
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
                                        <img src=".jpg" alt="photo" class="piccar"/>
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

            
    </article>

<section class="info">			
        <ul class="onglet"> 
                <li class="o" onclick="hideshowhousetxt()">description de la maison</li>
                <li class="o" onclick="hideshowmapblock()">localisation</li>
                <li class="o" onclick="hideshowownerinfo()">propriétaire</li>
        </ul>
    
    
        <div class="desc" id="housetxt" style="display: block">
                                     <?php echo $_SESSION['descriptBien']; ?>  
                                    </br>
                                    </br>
                                    <form method="post" action="../controler/content.php?page=modify">
                                    <?php
                                        while($resModHouse=$askModHouse->fetch())
                                            {
                                        ?>
                                        <textarea name="description"><?php echo $resModHouse['title']?></textarea>
                                        <?php
                                            } 
                                    ?>
                                        <input type="submit" name="Modifier"/>
                                        <input type="reset" name="Annuler"/>
                                    </form>
            </br>
            </br>

            Informations sur le logement:
            </br>
            </br>
            <?php echo $_SESSION['typ']; ?>  
                <?php 
                    while ($resHtype=$askHtype->fetch())
                        {
                            echo $resHtype['house_type'];
                        }
                ?>
            </br>
            <?php echo $_SESSION['capacit']; ?> 
                <?php 
                    while($resHcapacity=$askHcapacity->fetch())
                        {

                            echo $resHcapacity['nbr_people'];?> personne(s)<?php
                        }
                ?>
            </br>
            <?php echo $_SESSION['nombrChambr']; ?>  
                <?php
                    while($resHbrnb=$askHbrnb->fetch())
                        {
                            echo $resHbrnb['nbr_room'];?> chambre(s)<?php
                        }
                ?>
            </br>
            <?php echo $_SESSION['amenag']; ?>  
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
                <?php echo $_SESSION['vill']; ?>  
                    <?php
                        while ($resHtown=$askHtown->fetch())
                            {
                                echo $resHtown['ville_nom_reel'];
                            }
                    ?><br/>
                <?php echo $_SESSION['codPost']; ?>  
                    <?php
                        while ($resHzip=$askHzip->fetch())
                            {
                                echo $resHzip['ville_code_postal'];
                            }
                    ?><br/>
                <?php echo $_SESSION['adres']; ?> 
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
