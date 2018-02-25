<?php

/*
* url format
*
*/
function urlFormat($str){
	// string cut all whitespace
	$str = preg_replace('/\s*/', '', $str);
	// convert the string to all lowercase
	$str = strtolower($str);
	//url encode
	$srt = urlencode($str);
	return $str;
}
/*
* function format date 
*
*/
function formatDate($date){
	return date("M d, Y h:i A", strtotime($date));
}
/*
* is_active  function 
*/
function is_active($category){
	if(isset($_GET['category'])){
		if($_GET['category'] == $category){
			return 'active';
		}else{
		return '';
		}
	}else{
		if($category == null){
           return 'active';
		}
	}
}