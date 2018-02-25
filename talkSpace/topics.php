<?php require 'core/init.php'; ?>
<?php
$topic = new Topic;
$user = new User;

$category = isset($_GET["category"])? $_GET['category'] : null;
$user_id = isset($_GET["user"])? $_GET['user'] : null;


$template = new Template('templates/topics.php');

if(isset($category)){
	$template->topics = $topic->getByCategory($category);
	$template->title = 'Post In "' .$topic->getCategory($category)->cat_name.'"';
}
if(isset($user_id)){
	$template->topics = $topic->getByUser($user_id);
	//$template->title = 'Post In "' .$topic->getCategory($category)->name.'"';
}
if(!isset($category) && !isset($user_id)){
    $template->topics = $topic->getalltopic();
}

$template->totaltopic = $topic->getTotalTopics();
$template->totalCategory = $topic->getTotalCategory();
$template->totalUser  = $user->totalUsers();
echo $template;