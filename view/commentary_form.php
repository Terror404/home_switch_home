<br/>
<br/>
<div class='exchangeForm'>
    <form method='post' action='../controler/content.php?page=commentary_treatment'>
        
        Vous avez accueilli chez vous <a href='../controler/content.php?page=houseCard&id="<?php echo $_POST['idHouse2']; ?>"'><?php echo $_POST['loginUser2']?></a>
        <br/>
        Vous pouvez laisser une note et un commentaire sur cette personne :
        <br/>
        Votre note : <input type='text' name='rateU'/> / 10
        <br/>
        <legend>Le titre de votre commentaire</legend>
        <input type='text' name='titleH'/>
        <legend>Votre Commentaire : </legend>
        <textarea name='commentaryU'></textarea>
        <br/>
        <br/>
        
        Vous avez echangé avec lui sa maison : <a href='../controler/content.php?page=houseCard&id="<?php echo $_POST['idHouse2']; ?>"' target='_blank'><?php echo $_POST['titleHouse2'] ?></a>
        <br/>
        Vous pouvez laisser une note et un commentaire sur votre sejour :
        <br/>
        Votre note : <input type='text' name='rateU'/> / 10
        <br/>
        <legend>Le titre de votre commentaire</legend>
        <input type='text' name='titleU'/>
        <legend>Votre Commentaire : </legend>
        <textarea name='commentaryU'></textarea>
        <br/>
        <br/>
        <br/>
        
            <input type='text' name='date' value='<?php$today;?>'/>
            <input type='hidden' name='type' value='<?php echo $_POST['type']?>'/>
            <input type='hidden' name='idExch' value='<?php echo$_POST['idExch']?>'/>
            <input type="hidden" name="idUser2" value="<?php echo $_POST['idUser2']; ?>"/>
            <input type="hidden" name="idUser1" value="<?php echo $_POST['idUser1']; ?>"/>
            <input type="hidden" name="idHouse2" value="<?php echo $_POST['idHouse2']; ?>"/>
            <input type="hidden" name="idHouse1" value="<?php echo $_POST['idHouse1']; ?>"/>
            <input type='hidden' name='add' value='1'/>
            <input type='submit' value='Poster les commentaires et les notes'/>
            <input type='reset' value='Annuler'/>
        </form>
        
</div>