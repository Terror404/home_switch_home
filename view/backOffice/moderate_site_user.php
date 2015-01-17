<?php
/*$askUserBack=$DB->prepare('SELECT picture, login, date_creation, rating FROM user WHERE user.login=\''.$_POST['name'].'\'');
    $askUserBack->execute();*/
echo 'Results:'.$_POST['name'];
while($resUser=$askUserBack->fetch())
{
    echo '<div><img src="'.$resUser['picture'].' alt="photo de profil"/> <br/>'
            . 'Login : '.$resUser['login'].'<br/>'
            . 'Creation date : '.$resUser['date_creation'].'<br/>'
            .'Rating : '.$resUser['rating'].'<br/></div>'
            . '<br/>'
            . '<form method="post" action=\'../controler/back_office.php?page=moderateSite&state=3\'>'
            . '<input type="submit" value="Send a warning">'
            . '<input type="hidden" name="name" value="'.$_POST['name'].'">'
            . '</form>'
            . '<form method="post" action=\'../controler/back_office.php?page=moderateSite&state=4\'>'
            . '<input type="submit" value="Delete">'
            . '<input type="hidden" name="id" value="'.$resUser['id'].'">'
            . '<input type="hidden" name="name" value="'.$_POST['name'].'">'
            . '</form>'
            . '</div>'
            ;
}
?>

