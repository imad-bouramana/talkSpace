<?php 
require 'core/init.php'; ?>
<?php 
// topic object
$topic = new Topic;
//user object
$user = new User;
//validate object
$validate = new Validator;

if(isset($_POST['register'])){
	// create data array
	$data = array();
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['username'] = $_POST['username'];
	$data['password'] = md5($_POST['password']);
	$data['password2'] = md5($_POST['password2']);
	$data['about'] = $_POST['about'];
	$data['last_join'] = date('Y-m-d H:i:s');
	// field_array
	$field_array = array('name','email','username','password','password');
    // uploade avatar image
    if($validate->isRequired($field_array)){
    	if($validate->valideEmail($data['email'])){
    		if($validate->passwordMatch($data['password'], $data['password2'])){
                 //upload avatar
    			 if($user->uploadAvatar()){
    	               $data['avatar'] = $_FILES['avatar']['name'];
                 }else{
    	               $data['avatar'] = 'avatar.jpg';
                 }
    	        //	regester user
                 if($user->register($data)){
    	            redirect("index.php", 'You Are Regester By Success', 'seccuess');
                 }else{
    	            redirect('index.php', 'Semthig Went Wrong', 'error');
                 }
    		}else{
    			redirect('register.php', 'your Password Did Not Matsh', 'error');
    		}
    	}else{
    		redirect('register.php', 'Please Use A Valid Email', 'error');
    	}
    }else{
    	redirect('register.php', 'Please Fill Is Required', 'error');
    }
   

}

$template = new Template('templates/register.php');

$template->topics = $topic->getalltopic();
$template->totaltopic = $topic->getTotalTopics();
$template->totalCategory = $topic->getTotalCategory();

echo $template;
?>
