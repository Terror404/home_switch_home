<section class='MiddlePage'>

    <article class="RightCol">
        <h3 class="Title">Créer son annonce</h3>
        </br>
        
        <div class="form">
                <div class='title'> <!-- title of the house-->
        <?php
            while($resHtitle=$askHtitle->fetch())
                {
                    echo $resHtitle['title'];
                } 
        ?>
    </div>
    
    <div class="img"> <!-- Mettre ici les photos et les 2 boutons -->
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

    </div>
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


    