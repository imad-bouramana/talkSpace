<?php
class Topic{
	private $db;
	public function __construct(){
		$this->db = new Database;
	}
	public function getalltopic(){

		$this->db->query("SELECT topic.*, users.name, users.avatar, category.cat_name FROM topic
			   INNER JOIN users 
			   ON topic.user_id = users.id
			   INNER JOIN category
			   ON topic.category_id = category.id
			   ORDER BY time_add DESC
			   ");
		$results = $this->db->resultset();
		return $results;
	}
	/*
	* get by category
	*/
	public function getByCategory($category_id){

		$this->db->query("SELECT topic.*, users.name, users.avatar, category.cat_name FROM topic
			   INNER JOIN users 
			   ON topic.user_id = users.id
			   INNER JOIN category
			   ON topic.category_id = category.id
			   WHERE topic.category_id = :category_id
			   ");
		$this->db->bind(':category_id', $category_id);
		$results = $this->db->resultset();
		return $results;
	}
	// get by user
	public function getByUser($user_id){

		$this->db->query("SELECT topic.*, category.*, users.avatar, users.name FROM topic
			   INNER JOIN users 
			   ON topic.user_id = users.id
			   INNER JOIN category
			   ON topic.category_id = category.id
			   WHERE topic.user_id = :user_id
			   ");
		$this->db->bind(':user_id', $user_id);
		$results = $this->db->resultset();
		return $results;
	}
	/*
	* get caegory
	*/
	public function getCategory($category_id){
		$this->db->query("SELECT * FROM category WHERE id = :category_id");
        $this->db->bind(':category_id', $category_id);
        $row = $this->db->single();
        return $row;
	}

	// total topics 
	public function getTotalTopics(){
		$this->db->query("SELECT *  FROM topic ");
		$rows = $this->db->resultset();
	// get count
	    return $this->db->rowCount(); 
	}
	// total category 
	public function getTotalCategory(){
		$this->db->query("SELECT *  FROM category ");
		$rows = $this->db->resultset();
	// get count
	    return $this->db->rowCount(); 
	}
	// get total replies 
	public function getTotalReplies($topic_id){
		$this->db->query("SELECT * FROM replies WHERE topic_id = '$topic_id' ");
		$rows = $this->db->resultset();
	// get count
	    return $this->db->rowCount(); 
	}
	// get getTopic
	public function getTopic($id){
		$this->db->query("SELECT topic.*, users.name, users.name, users.avatar FROM topic
			INNER JOIN users
			ON topic.user_id = users.id
			WHERE topic.id = :id");
		$this->db->bind(":id", $id);
		$row = $this->db->single();
		return $row;
	}
	//get replies
    public function getReplies($topic_id){
    	$this->db->query("SELECT replies.*, users.* FROM replies
    		INNER JOIN users
    		ON replies.user_id = users.id
    		WHERE replies.topic_id = :topic_id
    		ORDER BY time_add DESC");
    	$this->db->bind(":topic_id", $topic_id);
    	$result = $this->db->resultset();
    	return $result;
    } 
    /*
    * create topic function
    */
    public function create($data){
    	$this->db->query("INSERT INTO topic (category_id, user_id, body, title, time_add) 
    		VALUES (:category_id,:user_id,:body,:title,:time_add)");
    	$this->db->bind(':category_id', $data['category_id']);
    	$this->db->bind(':user_id', $data['user_id']);
    	$this->db->bind(':body', $data['body']);
    	$this->db->bind(':title', $data['title']);
    	$this->db->bind(':time_add', $data['time_add']);
    	// execute
    	if($this->db->execute()){
    		return true;
    	}else{
    		return false;
    	}

    }
     /*
    * create reply function
    */
    public function reply($data){
    	$this->db->query("INSERT INTO replies (user_id, topic_id, body) 
    		VALUES (:user_id,:topic_id, :body)");
    	$this->db->bind(':user_id', $data['user_id']);
    	$this->db->bind(':topic_id', $data['topic_id']);
    	$this->db->bind(':body', $data['body']);
    
    	// execute
    	if($this->db->execute()){
    		return true;
    	}else{
    		return false;
    	}
    }
}