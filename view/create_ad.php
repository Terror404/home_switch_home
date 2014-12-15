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
        <h3>Localisation : </h3>
        Region : 
            <?php 
                while ($resHregion=$askHregion->fetch())
                    {
                        echo $resHregion['name'];
                    }
            ?><br/>
        Ville : 
            <?php
                while ($resHtown=$askHtown->fetch())
                    {
                        echo $resHtown['location_detail'];
                    }
            ?><br/>
        
    </div>
    </article>
    <article class="createAd">
        <label for="create_ad">Créer son annonce</label>
        <form method="POST" action="../modele/add_ad.php" id="create_ad" >
            Titre de l'annonce :<input type="text" name="title_ad"/><br/>
            Date de début :<input type="date" name="date_begin" /><br/>
            Date de fin :<input type="date" name="date_end" /><br/>
            <!--Send the house id--> <input type="hidden" name ="id_house" value="$_GET['id']"/>
            Critères ??
            <input type="submit" value="Créer l'annonce"/>
            
        </form>
    </article>
</section>


<section class="LeftCol">

</section>      
</section>
