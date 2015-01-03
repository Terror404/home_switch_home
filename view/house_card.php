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
                                <input type=submit value="Supprimer cette maison"/>
                            </form>
                    <?php
                        }
                        else
                        {
                    ?>
                            <input type="button" value="Proposer un échange pour cette maison" onclick="self.location.href='../controler/content.php?page=exchange'"/>
                    <?php
                        }
                    ?>
                            <br />
                    <!--Add as a favorite-->
                    <form method="post" action="../controler/content.php?page=confirm_favs">
                        <input type="hidden"  name="favs" value="1"/>
                        <input type="hidden" name="houseId" value="<?php echo $_GET['id'] ?>"/>
                        <input type="submit" value="Ajouter aux favoris"/>
                    </form>
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
            
        </div>
    </div>
    </article>


    <article class="ComMM"> <!-- Mettre ici les commentaires -->
            <p class="TxtCom"> Liste de 3-4 commentaires (les mieux notés ??)
                <?php
                    include"../view/commentary_bloc.php";
                ?>				
    </article>
</section>


<section class="LeftCol">


    <article class="DateMM"> <!-- Mettre ici les dates -->
        <input type="button" value="Ajouter une annonce" class="addAdButton" onclick="self.location.href='../controler/content.php?page=createAd&id=<?php echo$_GET['id']?>'"/>
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
    </article>
</section>      
</section>
			