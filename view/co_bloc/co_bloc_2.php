<aside class="champ"> <!--Champs de connexion-->
    <div class="SeCo"> Se connecter </div>
    <div>
        <?php $idPage=$_GET['page'] ?>
        <form method="post" action='../controler/content.php?page=<?php echo $idPage ?>' class="txtid" onsubmit="return verifForm(f)">
                <input type="text" name="login" id="login" maxlength="30" size="17" placeholder="Identifiant" onblur="verifPseudo(this)"/> <!-- Champ identifiant de 30 caractères maxi-->
            <br/>
            <input type="password" name="password" id="password" maxlength="30" size="17" placeholder="Mot de passe" onblur="verifPass(this)"/> <!-- Champ mdp de 30 caractères maxi-->
            <br/>
                    <input type="submit" value="Se connecter" />
            </form>
    </div>
    
    <a href="MDPoublie.html" class="mdpo"> Mot de passe oublié </a>
</aside>


<?php include"../view/co_bloc/script_verif_co.php"?>