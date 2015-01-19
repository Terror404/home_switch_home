<link rel="stylesheet" type="text/css" href="./../view/css/backoffice.css">

<div class="CommandFrame">
    <p>List of the ad criteria</p>
    <br/>
    <br/>


    <?php
    while($resAdCriteria=$askAdCriteria->fetch())
    {
        echo '<p>Criterion name: '.$resAdCriteria['real_name'].'<br/> </p>';
        echo '<p>Value in the database: '.$resAdCriteria['name'].'<br/><br/></p>';
    }

    if($_GET['confirm']==='1')
    {
        echo 'The criterion "'.$_POST['realName'].'" has been successfully added to the database with the value "'.$_POST['name'].'" <br/>';
    }
    ?>


    <form method="post" action='../controler/back_office.php?page=adCriteria&confirm=1'>
        <p>Add an ad criterion to DB:</p> <br/>
    <input type="text" style='width:20%; min-width:300px;' name="realName" placeholder="Real name of the criterion (ex: feed the goldfishes)" >
    <input type="text" style='width:20%; min-width:300px;' name="name" placeholder="value in DB (ex :feed_goldfishes)" >
    <input type="submit" value="+">
    </form>

    <br/>

    <form method="post" action='../controler/back_office.php?page=adCriteria&confirm=2'>
        <p>Delete a criterion:</p><br/>
    <input type="text" style='width:20%; min-width:300px;' name="name" placeholder="value in DB (ex :feed_goldfishes)" >
    <input type="submit" value="+">
    </form>
</div>