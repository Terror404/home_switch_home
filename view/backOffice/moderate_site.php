<p>Moderate your site</p>
<br/>

<form method="post" action='../controler/back_office.php?page=moderateSite&state=1'>
    <p>Search a user:</p><br/>
<input type="text" style='width:20%; min-width:300px;' name="name" placeholder="login" >
<input type="hidden" name="state" value="1">
<input type="submit" value="Search">
</form>
<br/>
<form method="post" action='../controler/back_office.php?page=moderateSite&state=2'>
    <p>Search an house:</p><br/>
<input type="text" style='width:20%; min-width:300px;' name="name" placeholder="id" >
<input type="submit" value="Search">
</form>
