<?php

while($resUser=$askUserSite->fetch())
{
    echo '<div><img src="'.$resUser['picture'].' alt="photo de profil"/> <br/>'
            . 'Login : '.$resUser['login'].'<br/>'
            . 'Creation date : '.$resUser['date_creation'].'<br/>'
            .'Rating : '.$resUser['rating'].'<br/></div>'
            ;
}
?>

