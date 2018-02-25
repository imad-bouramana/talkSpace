<?php include "core/init.php"; ?>
<?php 
if(isset($_POST['logout'])){
	// create user object
	$user = new User;
	if($user->logout()){
		redirect("index.php", 'You Are Now Logout', 'success');
	}

}else{
	redirect('index.php');
}