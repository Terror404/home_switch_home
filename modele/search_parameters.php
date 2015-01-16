<?php
$searchInfUser=$DB->prepare('SELECT login,password,mail,birthdate,phone_number FROM user WHERE id=:iduser');
    $searchInfUser->execute(array('iduser'=>$_SESSION['userId']));

$askInfUser=$DB->prepare('SELECT password,mail,phone_number FROM user WHERE id=:iduser');
    $askInfUser->execute(array('iduser'=>$_SESSION['userId']));

while($resInfUser=$askInfUser->fetch())
{
    $oldPassword=hash('SHA512',$resInfUser['password']);
    $oldMail=$resInfUser['mail'];
}

//Login modification
if(isset($_POST['whichForm']) AND $_POST['whichForm']==1)
{
    if(isset($_POST['modLogin']) AND $_POST['modLogin']!='')
    {
        $updateLogin=$DB->prepare('UPDATE user SET login=:modlogin WHERE id=:iduser');
            $updateLogin->execute(array('modlogin'=>$_POST['modLogin'], 'iduser'=>$_SESSION['userId']));
        $_SESSION['userLogin']=$_POST['modLogin'];
        $end=0;
    }
    else
    {
        $end=1;
    }
}

//Password modification
if(isset($_POST['whichForm']) AND $_POST['whichForm']==2)
{
    if(isset($_POST['modPassword']) AND !empty($_POST['modPassword'])
            AND isset($_POST['verifModPassword']) AND !empty($_POST['verifModPassword'])
            AND isset($_POST['oldPassword']) AND !empty($_POST['oldPassword']!=''))
    {
        if($_POST['modPassword']==$_POST['verifModPassword'])
        {
            if($oldPassword==hash('SHA512',$_POST['oldPassword']))
                {
                    $updateLogin=$DB->prepare('UPDATE user SET password=:modpassword WHERE id=:iduser');
                        $updateLogin->execute(array('modpassword'=>hash('SHA512',$_POST['modPassword']), 'iduser'=>$_SESSION['userId']));
                    $end=0;
                }
            else
            {
                $end=3;
            }
        }
        else
        {
            $end=2;
        }
    }
    else
    {
        $end=1;
    }
}

//Mail modification
if(isset($_POST['whichForm']) AND $_POST['whichForm']==3)
{
    if(isset($_POST['modMail']) AND !empty($_POST['modMail'])
            AND isset($_POST['verifModMail']) AND !empty($_POST['verifModMail'])
            AND isset($_POST['oldMail']) AND !empty($_POST['oldMail']!=''))
    {
        if($_POST['modMail']==$_POST['verifModMail'])
        {
            if($oldMail==$_POST['oldMail'])
            {
                if(filter_var($_POST['modMail'],FILTER_VALIDATE_EMAIL))
                {
                $updateLogin=$DB->prepare('UPDATE user SET mail=:modmail WHERE id=:iduser');
                    $updateLogin->execute(array('modmail'=>$_POST['modMail'], 'iduser'=>$_SESSION['userId']));
                $end=0;
                }
                else
                {
                    $end=4;
                }
            }
            else
            {
                $end=3;
            }
        }
        else
        {
            $end=2;
        }
    }
    else
    {
        $end=1;
    }
}

//Phone Number Modification
if(isset($_POST['whichForm']) AND $_POST['whichForm']==4)
{
    if(isset($_POST['modPhoneNumber']) AND $_POST['modPhoneNumber']!='')
    {
        $updateLogin=$DB->prepare('UPDATE user SET phone_number=:phonenb WHERE id=:iduser');
            $updateLogin->execute(array('modPhoneNumber'=>$_POST['modPhoneNumber'], 'iduser'=>$_SESSION['userId']));
        $end=0;
    }
    else
    {
        $end=1;
    }
}

//Birthdate Modification
if(isset($_POST['whichForm']) AND $_POST['whichForm']==5)
{
    if(isset($_POST['modBirthdate']) AND $_POST['modBirthdate']!='')
    {
        reorder_date_1($_POST['modBirthdate']);
        if(isset($newDate))
        {
            $updateLogin=$DB->prepare('UPDATE user SET birthdate=:modbirthdate WHERE id=:iduser');
                $updateLogin->execute(array('modbirthdate'=>$newDate, 'iduser'=>$_SESSION['userId']));
            $end=0;
        }
        else
        {
            $end=2;
        }
    }
    else
    {
        $end=1;
    }
}

//Language modification
if(isset($_POST['language']) AND $_POST['language']==0)
{
    $updateLanguage=$DB->prepare('UPDATE user SET language=0 WHERE id=:iduser');
        $updateLanguage->execute(array('iduser'=>$_SESSION['userId']));
    $end=0;
}
elseif(isset($_POST['language']) AND $_POST['language']==1)
{
    $updateLanguage=$DB->prepare('UPDATE user SET language=1 WHERE id=:iduser');
        $updateLanguage->execute(array('iduser'=>$_SESSION['userId']));
    $end=1;
}