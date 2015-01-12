<?php
/*$askUserBack=$DB->prepare('SELECT picture, login, date_creation, rating FROM user WHERE user.login=\''.$_POST['name'].'\'');
    $askUserBack->execute();*/
echo 'Results:'.$_POST['name'];
while($resHouse=$askHouse->fetch())
{
    echo '<div><img src="'.$resHouse['picture_1'].' alt="photo de profil"/> <br/>'
            . 'Title: '.$resHouse['title'].'<br/>'
            . 'Creation date : '.$resHouse['date_creation'].'<br/>'
            .'Rating : '.$resHouse['rating'].'<br/></div>'
            . '<br>'
            . '<form method="post" action=\'../controler/back_office.php?page=moderateSite&state=5\'>'
            . '<input type="submit" value="Send a warning">'
            . '<input type="hidden" name="name" value="'.$_POST['name'].'">'
            . '</form>'
            . '<form method="post" action=\'../controler/back_office.php?page=moderateSite&state=6\'>'
            . '<input type="submit" value="Delete">'
            . '<input type="hidden" name="name" value="'.$_POST['name'].'">'
            . '</form>'
            . '</div>'            ;
}
?>