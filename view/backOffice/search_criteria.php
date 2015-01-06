

<p> List of the search criteria</p>
<br/>
<br/>


<?php
while($resSearchCriteria=$askSearchCriteria->fetch())
{
    echo '<p>Criterion name: '.$resSearchCriteria['real_name'].'<br/> </p>';
    echo '<p>Value in the database: '.$resSearchCriteria['name'].'<br/><br/></p>';
}

if($_GET['confirm']==='1')
{
    echo 'The criterion "'.$_POST['realName'].'" has been successfully added to the database with the value "'.$_POST['name'].'" <br/>';
}
?>


<form method="post" action='../controler/back_office.php?page=searchCriteria&confirm=1'>
    <p>Add a search criterion to DB:</p> <br/>
<input type="text" style='width:20%; min-width:300px;' name="realName" placeholder="Real name of the criterion (ex: smoker are allowed)" >
<input type="text" style='width:20%; min-width:300px;' name="name" placeholder="value in DB (ex :allowed_animals)" >
<input type="submit" value="+">
</form>

<br/>

<form method="post" action='../controler/back_office.php?page=searchCriteria&confirm=2'>
    <p>Delete a criterion:</p><br/>
<input type="text" style='width:20%; min-width:300px;' name="name" placeholder="value in DB (ex :allowed_animals)" >
<input type="submit" value="+">
</form>
