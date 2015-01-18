 


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
    
    <article class='title'> 
        <h2>Titre de la maison : <h2>
        <?php
        /************************Modification title******************************/
        if(isset($_POST['title']))
        {
            if(isset($end) AND $end==0)
            {
                ?>
                <form method="post" action="../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>">
                    <input type="text" name="title" value="<?php echo $modTitle?>"/>
                    <input type="hidden"  name="confirmModif" value="1"/>
                    <input type="submit" class="sub" value="Modifier"/>
                    <input type="reset" class="sub" value="Annuler"/>
                </form>
            <?php
                echo"Vous n'avez pas rempli le champ correctement";
            }
            elseif(isset($end) AND $end==2)
            {
            ?>
                <form method="post" action="">
                    <input type="text" name="title" value="<?php echo $modTitle?>"/>
                    <input type="hidden"  name="confirmModif" value="1"/>
                    <input type="submit" class="sub" value="Modifier"/>
                    <input type="reset" class="sub" value="Annuler"/>
                </form>
            <?php
            }
        }
        else
        {
        ?>
            <form method="post" action="">
                <input type="text" name="title" value="<?php echo $modTitle?>"/>
                <input type="hidden"  name="confirmModif" value="1"/>
                <input type="submit" class="sub" value="Modifier"/>
                <input type="reset" class="sub" value="Annuler"/>
            </form>
        <?php  
        }
        ?>
        <?php
        if(isset($end) AND $end==2)
        {
            echo"La modification a été prise en compte";
        }
        ?>
        
    </article>
    <article class="img"> <!-- Mettre ici les photos et les 2 boutons -->
                    <p> <!-- main image-->
                        <img src="<?php echo $modPic ?>" alt="photo maison" class="image1">
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
                                    <?php
        /*********************************Modification description**************************/
                                    
        if(isset($_POST['description']))
        {
            if(isset($end) AND $end==0)
            {
                ?>
                <form method="post" action="../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>">
                    <textarea name="description"><?php echo $modDesc ?></textarea>
                    <input type="hidden"  name="confirmModif" value="1"/>
                    <input type="submit" value="Modifier"/>
                    <input type="reset" value="Annuler"/>
                </form>
            <?php
                echo"Vous n'avez pas rempli le champ correctement";
            }
            elseif(isset($_POST['description']) AND $end==2)
            {
            ?>
                <form method="post" action="../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>">
                    <textarea name="description"><?php echo $modDesc ?></textarea>
                    <input type="hidden"  name="confirmModif" value="1"/>
                    <input type="submit" value="Modifier"/>
                    <input type="reset" value="Annuler"/>
                </form>
            <?php
            }
        }
        else
        {
        ?>
            <form method="post" action="../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>">
                <textarea name="description"><?php echo $modDesc ?></textarea>
                <input type="hidden"  name="confirmModif" value="1"/>
                <input type="submit" value="Modifier"/>
                <input type="reset" value="Annuler"/>
            </form>
        <?php  
        }
        ?>
                                    
            </br>
            </br>

            Informations sur le logement:
            </br>
            </br>
            <?php echo $_SESSION['typ']; ?>  
                <?php 
                    while ($resHtype=$askHtype->fetch())
                        {
                            echo "<br/>Actuellement => ".$resHtype['house_type'];
                        }
                ?>
            
            <?php
        /************************Modification House Type******************************/
        if(isset($_POST['house_type']))
        {
            if(isset($end) AND $end==0)
            {
                ?>
                <br/>Modifier :
                <form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
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
                    </select>
                    <input type="hidden"  name="confirmModif" value="1"/>
                    <input type="submit" value="Modifier"/>
                    <input type="reset" value="Annuler"/>
                </form>
            <?php
                echo"Vous n'avez pas rempli le champ correctement";
            }
            elseif(isset($end) AND $end==2)
            {
            ?>
                <br/>Modifier :
                <form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
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
                    </select>
                    <input type="hidden"  name="confirmModif" value="1"/>
                    <input type="submit" value="Modifier"/>
                    <input type="reset" value="Annuler"/>
                </form>
            <?php
            }
        }
        else
        {
        ?>
            <br/>Modifier :
                <form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
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
                    </select>
                    <input type="hidden"  name="confirmModif" value="1"/>
                    <input type="submit" value="Modifier"/>
                    <input type="reset" value="Annuler"/>
                </form>
        <?php  
        }
        ?>
            
            </br>
            <?php echo $_SESSION['capacit']; ?> 
                <?php 
                    while($resHcapacity=$askHcapacity->fetch())
                        {
                            echo "<br/>Actuellement => ".$resHcapacity['nbr_people'];?> personne(s)<?php
                        }
                ?>
                        <?php
                    /************************Modification Capacity******************************/
                    if(isset($_POST['capacity']))
                    {
                        if(isset($end) AND $end==0)
                        {
                            ?>
                            <br/>Modifier
                            <form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
                                <input type='number' name='capacity'/> personne(s)
                                <input type="hidden"  name="confirmModif" value="1"/>
                                <input type="submit" value="Modifier"/>
                                <input type="reset" value="Annuler"/>
                            </form>
                        <?php
                            echo"Vous n'avez pas rempli le champ correctement";
                        }
                        elseif(isset($end) AND $end==2)
                        {
                        ?>
                            <br/>Modifier
                            <form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
                                <input type='number' name='capacity'/> personne(s)
                                <input type="hidden"  name="confirmModif" value="1"/>
                                <input type="submit" value="Modifier"/>
                                <input type="reset" value="Annuler"/>
                            </form>
                        <?php
                        }
                    }
                    else
                    {
                    ?>
                        <br/>Modifier
                        <form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
                            <input type='number' name='capacity'/> personne(s)
                            <input type="hidden"  name="confirmModif" value="1"/>
                            <input type="submit" value="Modifier"/>
                            <input type="reset" value="Annuler"/>
                        </form>
                    <?php  
                    }
                    ?>
                    
            </br>
            <?php echo $_SESSION['nombrChambr']; ?>  
                <?php
                    while($resHbrnb=$askHbrnb->fetch())
                        {
                            echo "<br/>Actuellement => ".$resHbrnb['nbr_room'];?> chambre(s)<?php
                        }
                ?>
                            <?php
        /************************Modification Nb Room******************************/
        if(isset($_POST['nbbr']))
        {
            if(isset($end) AND $end==0)
            {
                ?>
                <br/>Modifier
                    <form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
                        <input type='number' name='nbbr'/> chambre(s)
                        <input type="hidden"  name="confirmModif" value="1"/>
                        <input type="submit" value="Modifier"/>
                        <input type="reset" value="Annuler"/>
                    </form>
            <?php
                echo"Vous n'avez pas rempli le champ correctement";
            }
            elseif(isset($end) AND $end==2)
            {
            ?>
                <br/>Modifier
                    <form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
                        <input type='number' name='nbbr'/> chambre(s)
                        <input type="hidden"  name="confirmModif" value="1"/>
                        <input type="submit" value="Modifier"/>
                        <input type="reset" value="Annuler"/>
                    </form>
            <?php
            }
        }
        else
        {
        ?>
            <br/>Modifier
                    <form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
                        <input type='number' name='nbbr'/> chambre(s)
                        <input type="hidden"  name="confirmModif" value="1"/>
                        <input type="submit" value="Modifier"/>
                        <input type="reset" value="Annuler"/>
                    </form>
        <?php  
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
                <br/>Actuellement =><?php echo $modArea;?>
                <br/>Modifier :
            <br><form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
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
                </select>
                <input type="hidden"  name="confirmModif" value="1"/>
                <input type="submit" value="Modifier"/>
                <input type="reset" value="Annuler"/>
            </form>
                <br/>
                
                <?php echo $_SESSION['vill']; ?>  
                    <?php
                        while ($resHtown=$askHtown->fetch())
                            {
                                echo"<br/>Actuellement => ".$resHtown['ville_nom_reel'];
                            }
                    ?>
                <br/>
                
                <?php echo $_SESSION['codPost']; ?>  
                    <?php
                        while ($resHzip=$askHzip->fetch())
                            {
                                echo"<br/>Actuellement => ".$resHzip['ville_code_postal'];
                            }
                    ?>
                <br/><br/>Modifier la ville: <br/>
                <form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
                    <input type='text' name='town'/>
               
                    <br/>Modifier le code postal: <br/>
                    <input type='number' name='zipcode'/>
                    <input type="hidden"  name="confirmModif" value="1"/>
                    <input type="submit" value="Modifier"/>
                    <input type="reset" value="Annuler"/>
                 </form><br/>
                    
                <?php echo $_SESSION['adres']; ?> 
                <form method='post' action='../controler/content.php?page=modify_House_Card&id=<?php echo $_GET['id'];?>'>
                    <?php
                        while ($resHaddress=$askHaddress->fetch())
                            {
                               ?><input type='text' name='address' value='<?php echo $resHaddress['address'];?>'/><?php
                            }
                    ?>
                    <input type="hidden"  name="confirmModif" value="1"/>
                    <input type="submit" value="Modifier"/>
                    <input type="reset" value="Annuler"/>
                </form>
        </div>

        <div class="ownerinfo" id="ownerinfo" style="display: none">	
            <p> huge problem when profil reminder is included</p>
                
	</div>
    
    
    
</section> <!-- end of info section-->



    