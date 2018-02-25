<?php
/*
* get # of replies per topic
*/
function replyCount($topic_id){
	$db = new Database;
	$db->query('SELECT * FROM replies WHERE topic_id = :topic_id ');
	$db->bind(':topic_id', $topic_id);
	// assign rows
	$rows = $db->resultset();
	// get count
	return $db->rowCount(); 

}
function getAllCategory(){
	$db = new Database;
	$db->query("SELECT *  FROM category");
	$result = $db->resultset();
	return $result;
}
function userPostCount($user_id){
	// topic count
	$db = new Database;
	$db->query("SELECT * FROM topic WHERE user_id = :user_id");
	$db->bind(':user_id', $user_id);
	$rows = $db->resultset();
	$topic_count = $db->rowCount();
    // replies count
    $db->query("SELECT * FROM replies WHERE user_id = :user_id");
    $db->bind(":user_id", $user_id);
    $rows = $db->resultset();
    $replies_count = $db->rowCount();
    // return topic * replies
    return $topic_count + $replies_count;
}