<?php session_start()?>
<?php session_destroy() ?>
<div>Vous avez été correctement déconnecté. Retour à la page d'accueil</div>
<input type="button" onclick="self.location.href='../controler/content.php?page=home.php'" value="retour"/>