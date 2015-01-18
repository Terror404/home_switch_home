 
<?php require('../modele/fct_verif_date.php');?>
<script type="text/javascript" src="..//view/js/hide_show.js"> </script> 
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

<?php if (RESIDENCE_IS_SET AND RESIDENCE_EXISTS) {?>
<div class="topsub">
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
                            <form method="post" class="topsub1" action="../controler/content.php?page=confirm_delete_house">
                                <input type="hidden" name="idHouse" value="<?phpecho echo $idHouse?>"/>
                                <input class="sub1" type=submit value="Supprimer cette maison" class="sub"/>
                            </form>
                            
                            <!--Modify the house card-->
                            <form method="post" class="topsub1" action="../controler/content.php?page=modify_House_Card">
                                <input type="hidden"  name="confirmModif" value="1"/>
                                <input type="hidden" name="houseId" value="<?php echo $_GET['id'] ?>"/>
                                <input type="submit" class="sub2" value="Modifier la fiche de cette maison" class="sub"/>
                            </form>
                    <?php
                        }
                        else
                        {
                            $idHouse=$_GET['id'];
                    ?>
                            <form method="post" class="topsub1" action="../controler/content.php?page=exchange">
                                <input type="hidden" name="idUser2" value="<?php echo $idOwner ?>"/>
                                <input type="hidden" name="idHouseU2" value="<?php echo $idHouse ?>"/>
                                <input type="submit" class="sub1" value="Proposer un échange pour cette maison" class="sub"/>
                            </form>
                            
                            <!--Add as a favorite-->
                            <form method="post"  class="topsub1" action="../controler/content.php?page=confirm_favs">
                                <input type="hidden"  name="favs" value="1"/>
                                <input type="hidden" name="houseId" value="<?php echo $_GET['id'] ?>"/>
                                <input type="submit" class="sub2" value="Ajouter aux favoris" class="sub"/>
                            </form>
                    <?php
                        }
                    ?>
                            
            </div>

<section class='MiddlePage'>
    <div class="white"></div>
    <article class='title'> <!-- title of the house-->
        <?php
            while($resHtitle=$askHtitle->fetch())
                {
                    echo $resHtitle['title'];
                } 
        ?>
    </article>
    </br>
    </br>
    </br>
    
    <article class="img">
        <!-- Mettre ici les photos et les 2 boutons -->
                    <p> <!-- main image-->
                        <?php 
                            while ($resHpic=$askHpic->fetch()) {
                                ?>
                                <img src="<?php echo $resHpic['pictures'] ?>" alt="photo maison" class="image1">
                                <?php
                            }
                        ?>
                    </p>
                    <img src="..//view/pictures/house2.jpg" id="house1" style="display: none"/>
                    <img src="..//view/pictures/house2.jpg" id="house2" style="display: none"/>
                    <img src="..//view/pictures/house2.jpg" id="house3" style="display: none"/>

                    
                    
                    
                    <div class="caroussel">
                        <div class="subimg" > <img class="image-shown" src="..//view/pictures/house1.jpg" alt="house1" onclick="hideshowhouse1()"/></div>
                        <div class="subimg" > <img class="image-shown" src="..//view/pictures/house2.jpg" id="house1" onclick="hideshowhouse2()"/></div>
                        <div class="subimg" onclick="hideshowhouse3()"> <img class="image-shown" src="..//view/pictures/house3.jpg" id="house1" /></div>
                        <div class="subimg" onclick="hideshowhouse4()"> <img src="..//view/pictures/house4.jpg" id="house1" /></div>
                        <div class="subimg" onclick="hideshowhouse5()"> <img src="..//view/pictures/house1.jpg" id="house1"/></div>
                        <div class="subimg"> <img src="..//view/pictures/house1.jpg" id="house1"/></div>
                        <div class="subimg"> <img src="..//view/pictures/house1.jpg" id="house1"/></div>
                        <div class="subimg"> <img src="..//view/pictures/house1.jpg" id="house1" /></div>
                    </div>
            
    </article>

<section class="info">			
        <ul class="onglet"> 
                <li class="o" onclick="hideshowhousetxt()">Desrciption de la maison</li>
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
                                echo 'Desrciption du bien :';
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
                Critères spécifique à cette annonce :
                <?php
                        while ($resInfAds=$askInfAds->fetch())
                            {
                                ?>
                                    
                                   
                                <?php
                            }
                    ?>
            </div>
                
	</div>
    
    
    
</section> <!-- end of info section-->

<section class="comments">
    
    <div class="test2"></div>
<h2> Les commentaires </h2>
        <?php if($askComNb!=0)
        {
            while($resCom=$askCom->fetch())
            {
            echo '<div class="commentbox">
            <div class="commentauthor">

                    <p> <img class="userimg" src="'.$resCom['picture'].'" alt= "map"/> </p>
                    <p>'.$resCom['login'].'</p>
            </div>

            <div class="comment">
                    <p>'.$resCom['title'].'</p>
                    <p>'.$resCom['text'].'</p>
                    <p>posté le :'.$resCom['date'].'</p>
            </div>    
        </div>';
            }
        }
        else
        {
            echo 'Aucun commentaire disponible';
        }
?>
			
			
			
		</section>    
</section>
			
<?php }
else {
    echo "Erreur : Pas de maison trouvée.";
}
