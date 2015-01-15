<?php
include "../modele/search_co_bloc.php"
?>
<?php
if (
    isset($_POST['login']) AND $_POST['login']!=""
    AND isset($_POST['password']) AND $_POST['password']!=""
) {
    if (
        !($userInfo = $userInfoQuery->fetch()) //Will return true if there is actually a user by that name
        or (hash('SHA512',$_POST['password'])!=$userInfo['password'])
    ) {
        ?>
            <div class="WrongPass">Echec de connexion : login ou mot de passe incorrect.</div>
        <?php
        global $blocConnexion;
        $blocConnexion=2;
    }
    else 
    {
        $_SESSION['userLogin'] = $_POST['login'];
        $_SESSION['userId'] = $userInfo['id'];
        $_SESSION['userPic'] = $userInfo['picture'];
        $_SESSION['userAccess'] = $userInfo['access'];
    }
    
$traduct = $DB->prepare('SELECT * FROM traduction');
$traduct->execute();

$askLang = $DB->prepare('SELECT language FROM user WHERE user.id='.$userInfo['id']);
$askLang->execute();

while($resLang=$askLang->fetch())
{
    $lang=$resLang['language'];
    
}

if ($lang ==0)
{
    while($resTraduct = $traduct ->fetch())
    {
        $variable=$resTraduct['variable'];
        $_SESSION[$variable] = $resTraduct['french'];
    }
}
elseif ($lang ==1)
{
    while($resTraduct = $traduct ->fetch())
    {
        $variable=$resTraduct['variable'];
        $_SESSION[$variable] = $resTraduct['english'];
    }
}

}
else {
    ?> <div class="NoLogPass">Veuillez remplir tous les champs.</div> <?php
    global $blocConnexion;
    $blocConnexion=2;
}
