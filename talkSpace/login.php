<?php
include 'core/init.php'; ?>
<?php
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	// create user object
    $user = new User;
    if($user->login($username, $password)){
    	redirect('index.php', 'You Are Logged By Success', 'success');
    }else{
    	redirect('index.php','This Login Is Faild', 'error');
    }
}else{
	redirect('index.php');
}