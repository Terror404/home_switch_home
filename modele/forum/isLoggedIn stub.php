<?php

function isLoggedIn() {
	return true/*(isset($_SESSION['userId']) AND $_SESSION['userId'] != 0)*/;
}

?>