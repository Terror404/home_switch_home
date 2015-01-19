<br/>
<br/>
<h2 class="top"> Que pensez-vous de votre séjour?</h2>
<div class='exchangeForm'>
    <form method='post' action='../controler/content.php?page=commentary_treatment'>
   
        Vous avez accueilli chez vous <a href='../controler/content.php?page=houseCard&id="<?php echo $_POST['idHouse2']; ?>"'><?php echo $_POST['loginUser2']?></a>
        <br/>
        Vous pouvez laisser une note et un commentaire sur cette personne :
        <br/>
         <br/>
        <label> Votre note : </label><input class="rate" type='text' name='rateU'/> / 10
        <br/>
        <label> Le titre de votre commentaire: </label>
        <input type='text' class="titlec" name='titleU'/>
        <label>Votre Commentaire : </label>
        <textarea name='commentaryU' class="desc"></textarea>
        <br/>
        <br/>   
 
        
        Vous avez echangé avec lui sa maison : <a href='../controler/content.php?page=houseCard&id="<?php echo $_POST['idHouse2']; ?>"' target='_blank'><?php echo $_POST['titleHouse2'] ?></a>
        <br/>
        Vous pouvez laisser une note et un commentaire sur votre sejour :
        <br/>
         <br/>
       <label> Votre note : </label><input class="rate" type='text' name='rateH'/> / 10
        <br/>
        <label>Le titre de votre commentaire</label>
        <input type='text' class="titlec" name='titleH'/>
        <label>Votre Commentaire : </label>
        <textarea name='commentaryH'class="desc"></textarea>
        <br/>
        <br/>
        <br/>

            
            <input type='hidden' name='type' value='<?php echo $_POST['type']?>'/>
            <input type='hidden' name='idExch' value='<?php echo$_POST['idExch']?>'/>
            <input type="hidden" name="idUser2" value="<?php echo $_POST['idUser2']; ?>"/>
            <input type="hidden" name="idUser1" value="<?php echo $_POST['idUser1']; ?>"/>
            <input type="hidden" name="idHouse2" value="<?php echo $_POST['idHouse2']; ?>"/>
            <input type="hidden" name="idHouse1" value="<?php echo $_POST['idHouse1']; ?>"/>
            <input type='hidden' name='add' value='1'/>
            <p class="twosubs">
                <input type='submit' class="sub1" value='Poster les commentaires et les notes'/>
                <input type='reset' class="sub2" value='Annuler'/>
            </p>
      
        </form>
</div>