<?php

while ($category = $categoryList->fetch())
{
	?>
	<p><a href="./../controler/content.php?page=showForum&amp;c=<?php echo $category['id'] ?>">
	<!-- Storing category in $_GET['c'] -->
	<strong><?php echo $category['title'] ?></strong></a><br/>
	<?php echo $category['description']?></p>
	<?php
}
$categoryList->closeCursor();

?>