<?php require 'core/init.php'; ?>
<?php
$topic = new Topic;
$template = new Template('templates/create.php');

if(isset($_POST['submit'])){
   $validate = new Validator;
   $data = array();
   $data['title'] = $_POST['title'];
   $data['category_id'] = $_POST['category'];
   $data['body'] = $_POST['body'];
   $data['user_id'] = getUser()['user_id'];
   $data['time_add'] = date("Y:m:d H:i:s");
   //required field
   $field_array = array('title','category','body');
   if($validate->isRequired($field_array)){
   	 if($topic->create($data)){
   	 	redirect("index.php", 'Your Topic Was Create By Susccess', 'success');
   	 }else{
   	 	redirect("topic.php?id=".$topic_id,'Somthing Is Wrong With Your Topic', 'error');

   	 }
   }else{
   	redirect("create.php",'Please Fill In All Field', 'error');
   }
}

$template->topics = $topic->getalltopic();
$template->totaltopic = $topic->getTotalTopics();
$template->totalCategory = $topic->getTotalCategory();

echo $template;