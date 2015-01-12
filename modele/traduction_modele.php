<?php
$traduct = $DB->prepare('SELECT * FROM traduction');
$traduct->execute();

$askLang = $DB->prepare('SELECT language FROM user WHERE user.id='.$_POST['id']);
$askLang->execute();

if ($lang ==0)
while($resTraduct = $traduct ->fetch())
{
$_SESSION[$resTraduct['variable']] = $resTraduct['english'];
}
elseif ($lang ==1)
while($resTraduct = $traduct ->fetch())
{
$_SESSION[$resTraduct['variable']] = $resTraduct['french'];
}
?>