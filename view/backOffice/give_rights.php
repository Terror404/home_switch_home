<div> Administrator of the site
    <br/>
<?php 
while($resAccessAdmin=$askAccessAdmin->fetch())
{
    echo $resAccessAdmin['login'].'<br/>';
    echo 'Tel:'.$resAccessAdmin['phone_number'].'<br/>';
    echo 'Mail:'.$resAccessAdmin['mail'].'<br/>';
}
?>
    
    <br/>
    <br/>

<div> Moderator of the site
    <br/>
<?php 
while($resAccessModerator=$askAccessModerator->fetch())
{
    echo $resAccessModerator['login'].'<br/>';
    echo 'Tel:'.$resAccessModerator['phone_number'].'<br/>';
    echo 'Mail:'.$resAccessModerator['mail'].'<br/>';
}
?>
    
    <br/>
    <br/>

<div> Moderator of the forum
    <br/>
<?php 
while($resAccessForumModerator=$askAccessForumModerator->fetch())
{
    echo $resAccessForumModerator['login'].'<br/>';
    echo 'Tel:'.$resAccessForumModerator['phone_number'].'<br/>';
    echo 'Mail:'.$resAccessForumModerator['mail'].'<br/>';
}
?>
    <br/>
    <br/>

    <form method="post" id="accessUserButton" action='../controler/back_office.php?page=rights&state=1'>
    <p>Modify the rights of a user:</p>
<input type="text" style='width:20%; min-width:300px;' name="name" placeholder="login(ex:doge92)" >
<select name="state" id="selectAccessLvl">
    <option value="0">None
    <option value="1">Forum moderator
    <option value="2">Site moderator
    <option value="3">Site Administrator
</select>

<input  type="submit" value="+" onclick="direct()" >
</form>