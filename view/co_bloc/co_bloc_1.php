<aside class="Cobuttons"> 
    <div>
            <?php $idPage=$_GET['page'] ?>
            <form method='post' action='../controler/content.php?page=<?php echo $idPage ?>' class="co"> <!--Bouton connexion-->
                <input type="hidden" name="blocConnexion" value="2" />
                <input type="submit" value="Connexion" style="width:130px" />
            </form>

            <form class="insc"> <!--Bouton inscription-->
                    <input type="button" name="inscription" value="Inscription" onclick="self.location.href='page2.html'" style="width:130px" />
            </form>
        
    </div>
</aside>