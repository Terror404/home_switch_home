<section class='MiddlePage'>
<section class="createAdHome">
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
        </p><br/>
        <div class='otherI'>
        <h3>Localisation : </h3>
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
            ?><br/><br/><br/>
        
    </div>
    </article>
    <article class="createAd">
        <h3>Créer son annonce</h3>
        <form method="POST" action="../controler/content.php?page=confAd" id="create_ad" >
            Titre de l'annonce :<input type="text" name="title_ad"/><br/><br/>
            
            Date de début :<input type="text" name="date_begin" placeholder='jj/mm/aaaa' /><br/><br/>
            
            Date de fin :<input type="text" name="date_end" placeholder='jj/mm/aaaa' /><br/><br/>
            
            <!--Send the house id--> <input type="hidden" name ="id_house" value="$_GET['id']"/><br/>
            
            Description de l'annonce : 
            <textarea name="adDescription"></textarea><br/><br/>
            
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
            <input type="submit" value="Créer l'annonce"/>
            
        </form>
    </article>
</section>


<section class="LeftCol">

</section>      
</section>
