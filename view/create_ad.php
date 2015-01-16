<script type = "text/javascript">
			function hideshowhousetxt()
			{
			document.getElementById("housetxt").style.display="block";
			document.getElementById("ownerinfo").style.display="none";
			document.getElementById("mapblock").style.display="none";
                        document.getElementById("ad").style.display="none";
			}
			function hideshowownerinfo()
			{
			document.getElementById("housetxt").style.display="none";
			document.getElementById("ownerinfo").style.display="block";
			document.getElementById("mapblock").style.display="none";
                        document.getElementById("ad").style.display="none";
			}
			function hideshowmapblock()
			{
			document.getElementById("housetxt").style.display="none";
			document.getElementById("ownerinfo").style.display="none";
			document.getElementById("mapblock").style.display="block";
                        document.getElementById("ad").style.display="none";
			}
                        function hideshowad()
			{
			document.getElementById("housetxt").style.display="none";
			document.getElementById("ownerinfo").style.display="none";
			document.getElementById("mapblock").style.display="none";
                        document.getElementById("ad").style.display="block";
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
                        
                    </div>
            
            
    </article>

<section class="info">			
        <ul class="onglet"> 
                <li class="o" onclick="hideshowhousetxt()">Description de la maison</li>
                <li class="o" onclick="hideshowmapblock()">
                    <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['local']; 
                            }
                            else 
                            {
                                echo 'Localisation';
                            }
                            ?>
                </li>
                <li class="o" onclick="hideshowownerinfo()">Propriétaire</li>
                <li class="o" onclick="hideshowad()">Annonces</li>
        </ul>
    
    
        <div class="desc" id="housetxt" style="display: block">
                <?php
                           while($resHdesc=$askHdesc->fetch())
                                {
                ?>
                                   <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['descriptBien']; 
                            }
                            else 
                            {
                                echo 'Description du bien :';
                            }
                            ?> 
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
            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['typ']; 
                            }
                            else 
                            {
                                echo 'Type :';
                            }
                            ?> 
                <?php 
                    while ($resHtype=$askHtype->fetch())
                        {
                            echo $resHtype['house_type'];
                        }
                ?>
            </br>
            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['capacit']; 
                            }
                            else 
                            {
                                echo 'Capacité';
                            }
                            ?>
                <?php 
                    while($resHcapacity=$askHcapacity->fetch())
                        {

                            echo $resHcapacity['nbr_people'];?> personne(s)<?php
                        }
                ?>
            </br>
            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['nombrChambr']; 
                            }
                            else 
                            {
                                echo 'Nombre de chambre :';
                            }
                            ?> 
                <?php
                    while($resHbrnb=$askHbrnb->fetch())
                        {
                            echo $resHbrnb['nbr_room'];?> chambre(s)<?php
                        }
                ?>
            </br>
            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['amenag']; 
                            }
                            else 
                            {
                                echo 'Aménagements :';
                            }
                            ?> 
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
            
            <p class="desc">
                <img class="map" src="..//view/pictures/search-background.jpg" alt= "map"/> </br>  </br> 
                Region : 
                    <?php 
                        while ($resHregion=$askHregion->fetch())
                            {
                                echo $resHregion['real_name'];
                            }
                    ?><br/>
                <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['vill']; 
                            }
                            else 
                            {
                                echo 'Ville :';
                            }
                            ?>  
                    <?php
                        while ($resHtown=$askHtown->fetch())
                            {
                                echo $resHtown['ville_nom_reel'];
                            }
                    ?><br/>
                <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['codPost']; 
                            }
                            else 
                            {
                                echo 'Code postal :';
                            }
                            ?>  
                    <?php
                        while ($resHzip=$askHzip->fetch())
                            {
                                echo $resHzip['ville_code_postal'];
                            }
                    ?><br/>
                <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['adres']; 
                            }
                            else 
                            {
                                echo 'Adresse :';
                            }
                            ?> 
                    <?php
                        while ($resHaddress=$askHaddress->fetch())
                            {
                                echo $resHaddress['address'];
                            }
                    ?>
            </p>  
        </div>

        <div class="ownerinfo" id="ownerinfo" style="display: none">	
            <p> <?php require("../modele/search_profile_reminder.php");                            
                            include("../view/profile_reminder.php");?>
            </p>
            
            
                
	</div>
        <div class="ad" id="ad" style="display: none">	
            <div class="dates">
                <?php
                        while ($resDates=$askDates->fetch())
                            {
                                echo 'De'.$resDates['A.date_begin'].'à'.$resDates['A.date_end'];
                            }
                    ?>
            </div>
                
	</div>
    
    
    
</section> <!-- end of info section-->

    <article class="RightCol">
        <h3 class="Title">Créer son annonce</h3>
        </br>
        
        <div class="form">
            <form method="POST" action="../controler/content.php?page=confAd" id="create_ad" >
                <label> Titre de l'annonce :</label>
                <input type="text" name="title_ad"/>
                <br/><br/>
            
            <label>Date de début :</label>
            <input type="text" name="date_begin" placeholder='jj/mm/aaaa' /><br/><br/>
            
           <label> Date de fin :</label>
           <input type="text" name="date_end" placeholder='jj/mm/aaaa' /><br/><br/>
            
            <!--Send the house id--> <input type="hidden" name ="id_house" value="$_GET['id']"/><br/>
             <div class="DescriptionMM" >
            Description de l'annonce : 
            <textarea name="adDescription"></textarea><br/><br/>
            </div>
            Critères spécifiques à l'annonce : <br/>
                <h3> Aménagements :</h3>
                
                         <?php
                             $askSearchBoxCriteria=$DB->prepare('SELECT * FROM criteria');
                             $askSearchBoxCriteria->execute();
                            while($resSearchBoxCriteria=$askSearchBoxCriteria->fetch())
                            {
                                echo '<input type="checkbox" name="'.$resSearchBoxCriteria['name'].'"><label >'.$resSearchBoxCriteria['real_name'].'</label><br/>'.
                                
                                '<input type="text" name="critDesc'.$resSearchBoxCriteria['name'].'" placeholder="description de ce que vous attendez"/><br/><br/>';
                                
                            }
                            ?>
                <input type='text' name='critDesc5' placeholder='description de ce que vous attendez'/><br/><br/>
                <input type="hidden" name="id_house" value="<?php echo$_GET['id']?>"/>
            <input  class="sub" type="submit" value="Créer l'annonce"/>
            
        </form>
    </article>
</section>


    