<div class='exchangeForm'>
    <form method='post' action='../controler/content.php?page=commentary_treatment'>
        Vous avez accueilli chez vous <?php echo $loginUser2?>
        <br/>
        Vous pouvez laisser une note et un commentaire sur cette personne :
        <br/>
        Votre note : <input type='text' name='rate'/> / 10
        <br/>
        <legend>Votre Commentaire : </legend>
        <textarea name='commentary'></textarea>
        <br/>
        <br/>
        Vous avez echangé avec lui sa maison : <a href='../controler/content.php?page=houseCard&id="<?php echo $idHouse2; ?>"' target='_blank'><?php echo $titleHouse2 ?></a>
        <br/>
        Vous pouvez laisser une note et un commentaire sur votre sejour :
        <br/>
        Votre note : <input type='text' name='rate'/> / 10
        <br/>
        <legend>Votre Commentaire : </legend>
        <textarea name='commentary'></textarea>
        <br/>
        <br/>
        <br/>


            
            <input type='submit' value='Poster les commentaires et les notes'/>
            <input type='reset' value='Annuler'/>
        </form>
        
</div>