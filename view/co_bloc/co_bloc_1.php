<aside class="Cobuttons"> 
    <div >
            <?php $idPage=$_GET['page'] ?>
            <form method='post' action='../controler/content.php?page=<?php echo $idPage ?>' class="co"> <!--Bouton connexion-->
                <input type="hidden" name="blocConnexion" value="2" class="centerBlocCo" />
                <input type="submit" value="Connexion"  class="centerBlocCo"/>
            </form>

            <form class="insc"> <!--Bouton inscription-->
                    <input type="button" name="inscription" value="Inscription" onclick="self.location.href='../controler/content.php?page=formUser'" class="centerBlocCo" />
            </form>
        
    </div>
</aside>