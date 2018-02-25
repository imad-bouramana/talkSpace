<?php require'core/init.php'; ?>
<?php
$topic = new Topic;
$user = new User;
$template = new Template("templates/frontpage.php");

$template->topics = $topic->getalltopic();
$template->totaltopic = $topic->getTotalTopics();
$template->totalCategory = $topic->getTotalCategory();
$template->totalUser  = $user->totalUsers();


echo $template;
