<p> List of the house criteria</p>
<br/>
<br/>


<?php
while($resHouseCriteria=$askHouseCriteria->fetch())
{
    echo '<p>Criterion name: '.$resHouseCriteria['real_name'].'<br/> </p>';
    echo '<p>Value in the database: '.$resHouseCriteria['name'].'<br/><br/></p>';
}

if($_GET['confirm']==='1')
{
    echo 'The criterion "'.$_POST['realName'].'" has been successfully added to the database with the value "'.$_POST['name'].'" <br/>';
}
?>


<form method="post" action='../controler/back_office.php?page=houseCriteria&confirm=1'>
    <p>Add an ad criterion to DB:</p> <br/>
<input type="text" style='width:20%; min-width:300px;' name="realName" placeholder="Real name of the criterion (ex: possess a covered pool)" >
<input type="text" style='width:20%; min-width:300px;' name="name" placeholder="value in DB (ex :covered_pool)" >
<input type="submit" value="+">
</form>

<br/>

<form method="post" action='../controler/back_office.php?page=houseCriteria&confirm=2'>
    <p>Delete a criterion:</p><br/>
<input type="text" style='width:20%; min-width:300px;' name="name" placeholder="value in DB (ex :covered_pool)" >
<input type="submit" value="+">
</form>
