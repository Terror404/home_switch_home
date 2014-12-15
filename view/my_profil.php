<?php
session_start();
?>

   
    
        
	<h1>Fiche profil</h1>
<ul>
    <?php
while ($donnees = $req->fetch())
{
	echo '<li>'.$donnees['login'].$donnees['description'].$donnees['rating'].$donnees['picture'].'</li>';
}
?>
</ul>
<?php
$req->closeCursor();
?>
<?php
if(isset($_SESSION)AND $_SESSION['login']==$donnees['login'])
{
    echo $donnees['rating'];
}

     ?>
     <link rel="stylesheet" href="../RatingSystem/css_rating_system.css" />
        <form method="get" action="../RatingSystem/cible.php">
            <div class="rating">
                <fieldset class="rating">
                    <legend>Votre note</legend>
                    <input type="radio" id="RH10" name="ratingH" value="10" class="rating-input"/><label for="RH10" title="10/10" class="rating-star"></label>
                    <input type="radio" id="RH9" name="ratingH" value="9" class="rating-input"/><label for="RH9" title="9/10" class="rating-star"></label>
                    <input type="radio" id="RH8" name="ratingH" value="8" class="rating-input"/><label for="RH8" title="8/10" class="rating-star"></label>
                    <input type="radio" id="RH7" name="ratingH" value="7" class="rating-input"/><label for="RH7" title="7/10" class="rating-star"></label>
                    <input type="radio" id="RH6" name="ratingH" value="6" class="rating-input"/><label for="RH6" title="6/10" class="rating-star"></label>
                    <input type="radio" id="RH5" name="ratingH" value="5" class="rating-input"/><label for="RH5" title="5/10" class="rating-star"></label>
                    <input type="radio" id="RH4" name="ratingH" value="4" class="rating-input"/><label for="RH4" title="4/10" class="rating-star"></label>
                    <input type="radio" id="RH3" name="ratingH" value="3" class="rating-input"/><label for="RH3" title="3/10" class="rating-star"></label>
                    <input type="radio" id="RH2" name="ratingH" value="2" class="rating-input"/><label for="RH2" title="2/10" class="rating-star"></label>
                    <input type="radio" id="RH1" name="ratingH" value="1" class="rating-input"/><label for="RH1" title="1/10" class="rating-star"></label>
                </fieldset>
            </div>
}


        
            <br/><input type="submit" value="Noter" />
        </form>
        <div>
			<input class="bouton" type="button" value="Me contacter" />
		</div>
		<div>
			<input class="bouton" type="button" value="Voir les commentaires" />
		</div>
    


