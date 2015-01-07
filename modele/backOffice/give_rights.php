<?php
$askAccessAdmin=$DB->prepare('SELECT * FROM user WHERE access=\'3\'');
$askAccessAdmin->execute();

$askAccessModerator=$DB->prepare('SELECT * FROM user WHERE access=\'2\'');
$askAccessModerator->execute();

$askAccessForumModerator=$DB->prepare('SELECT * FROM user WHERE access=\'1\'');
$askAccessForumModerator->execute();

