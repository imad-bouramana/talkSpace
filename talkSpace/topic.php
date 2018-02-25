<?php require 'core/init.php'; ?>
<?php
//topic object
$topic = new Topic;

$topic_id = $_GET['id'];
$template = new Template('templates/topicc.php');

$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;

//reply form 
if(isset($_POST['reply'])){
   //validate object
$validate = new Validator;

   $data = array();
   $data['topic_id'] = $_GET['id'];
   $data['body'] = $_POST['body'];
   $data['user_id'] = getUser()['user_id'];
  
   //required field
   $field_array = array('body');
   if($validate->isRequired($field_array)){
   	 if($topic->reply($data)){
   	 	redirect("topic.php?id=".$topic_id, 'Your Reply Was Create By Susccess', 'success');
   	 }else{
   	 	redirect("topic.php?id=".$topic_id,'Somthing Is Wrong With Your Topic', 'error');
   	 }
   }else{
   	redirect("topic.php?id=".$topic_id,'Please Fill In All Field', 'error');
   }
}

$template->topics = $topic->getalltopic();
$template->totaltopic = $topic->getTotalTopics();
$template->totalCategory = $topic->getTotalCategory();


echo $template;