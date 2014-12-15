<?php

/* Clément tu peux include ou copier-coller le morceau dans content, comme tu
 * veux.
 */

elseif ($_GET['page'] == 'forumIndex')
{
	include("forum/index.php");
}
elseif ($_GET['page'] == 'editPost')
{
	include("forum/editmessage.php");
}
elseif ($_GET['page'] == 'addPost')
{
	include("forum/newmessage.php");
}
elseif ($_GET['page'] == 'addTopic')
{
	include("forum/newtopic.php");
}
elseif ($_GET['page'] == 'showForum')
{
	include("forum/showcategory.php");
}
elseif ($_GET['page'] == 'showTopic')
{
	include("forum/showtopic.php");
}
/* forum/messagelistupdate est un sous-contrôleur (temporaire ?) de showtopic
 * dédié à l'ajout de nouveaux messages (SQL), il n'a donc pas sa propre page
 */

?>