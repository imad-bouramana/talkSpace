<?php
class User{
	private $db;
	public function __construct(){
		$this->db = new Database;
	}
	// register users
	public function register($data){
         $this->db->query("INSERT INTO users (name, username, email, password, avatar, about, last_join)
         	VALUES (:name, :username, :email, :password, :avatar, :about, :last_join)");
         // bind value 
         $this->db->bind(':name', $data['name']);
         $this->db->bind(':username', $data['username']);
         $this->db->bind(':email', $data['email']);
         $this->db->bind(':password', $data['password']);
         $this->db->bind(':avatar', $data['avatar']);
         $this->db->bind(':about', $data['about']);
         $this->db->bind(':last_join', $data['last_join']);
         // execute
         if($this->db->execute()){
         	return true;
         }else{
         	return false;
         }

	}
	// upload avatar
	public function uploadAvatar(){
		$allowedExts = array("gif","jpeg","jpg","png");
		$temp = explode(".", $_FILES['avatar']['name']);
		$extention  = end($temp);

		if((($_FILES['avatar']['type'] == 'image/gif') 
			|| ($_FILES['avatar']['type'] == 'image/jpeg')
			|| ($_FILES['avatar']['type'] == 'image/jpg')
			|| ($_FILES['avatar']['type'] == 'image/pjpeg')
			|| ($_FILES['avatar']['type'] == 'image/x-png')
			|| ($_FILES['avatar']['type'] == 'image/png'))
			&& ($_FILES['avatar']['size'] < 50000)
			&& in_array($extention, $allowedExts)){
		    if($_FILES['avatar']['error'] > 0){
		    	redirect('register.php', $_FILES['avatar']['error'], 'error');
		    }else{
		    	if(file_exists('images/avatar/'. $_FILES['avatar']['name'])){
		    		redirect('register.php', 'File Already Exist', 'error');
		    	}else{
		    		move_uploaded_file($_FILES['avatar']['tmp_name'],
		    			'images/avatar/' . $_FILES['avatar']['name']);
		    		return true;
		    	}
		    }	
		}else{
			redirect('register.php', 'Invalid Type Name', 'error');
		}
	}
	// user login function
	public function login($username, $password){
		$this->db->query("SELECT * FROM users WHERE username = :username AND password = :password");
		$this->db->bind(':username', $username);
		$this->db->bind(':password', $password);

		$row = $this->db->single();
		if($this->db->rowCount() > 	0){
            $this->setUserData($row);
            return true;
		}else{
			return false;
		}
	}
	/*
	* set user data
	*/

	private function setUserData($row){
		$_SESSION['is_loggin_in'] = true;
		$_SESSION['user_id'] = $row->id;
		$_SESSION['username'] = $row->username;
		$_SESSION['name'] = $row->name;
	}
	/*
	* set user data
	*/

	public function logout(){
		unset($_SESSION['is_loggin_in']);
		unset($_SESSION['user_id']);
		unset($_SESSION['username']);
		unset($_SESSION['name']);
		return true;
	}
	/*
	* total users
	*/
	public function totalUsers(){
		$this->db->query("SELECT * FROM users");
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}
}