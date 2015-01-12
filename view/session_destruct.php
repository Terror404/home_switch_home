<?php session_start()?>
<?php session_destroy() ?>
<div> <?php echo $_SESSION['correctDeconnect']; ?> </div>
<input type="button" onclick="self.location.href='../controler/content.php?page=home'" value="retour"/>