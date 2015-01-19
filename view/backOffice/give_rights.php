<link rel="stylesheet" type="text/css" href="./../view/css/backoffice.css">

<div class="CommandFrame">
    <h3>Site administrators</h3>
    <?php 
    while($resAccessAdmin=$askAccessAdmin->fetch())
    {
        echo '<br/>';
        echo $resAccessAdmin['login'].'<br/>';
        echo 'Tel: '.$resAccessAdmin['phone_number'].'<br/>';
        echo 'Mail: '.$resAccessAdmin['mail'].'<br/>';
    }
    ?>
    <br/>

    <h3>Site moderators</h3>
    <?php 
    while($resAccessModerator=$askAccessModerator->fetch())
    {
        echo '<br/>';
        echo $resAccessModerator['login'].'<br/>';
        echo 'Tel:'.$resAccessModerator['phone_number'].'<br/>';
        echo 'Mail:'.$resAccessModerator['mail'].'<br/>';
    }
    ?>
    <br/>

    <h3>Forum moderators</h3>
    <?php 
    while($resAccessForumModerator=$askAccessForumModerator->fetch())
    {
        echo '<br/>';
        echo $resAccessForumModerator['login'].'<br/>';
        echo 'Tel:'.$resAccessForumModerator['phone_number'].'<br/>';
        echo 'Mail:'.$resAccessForumModerator['mail'].'<br/>';
    }
    ?>
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
</div>