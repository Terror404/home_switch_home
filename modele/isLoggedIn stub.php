<?php

function isLoggedIn() {
    return (isset($_SESSION['userId']) AND $_SESSION['userId'] != 0);
}

?>