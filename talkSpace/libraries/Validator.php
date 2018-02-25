<?php
class Validator{
	/*
	* chek required field
	*/
	public function isRequired($field_array){
		foreach($field_array as $field){
			if($_POST[''.$field.''] == ""){
				return false;
			}
		}
		return true;
	}
	/*
	* validat email
	*/
	public function valideEmail($email){
		if(FILTER_VAR($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;
		}
	}
	/*
	* password match
	*/
	public function passwordMatch($psw1, $psw2){
		if($psw1 == $psw2){
			return true;
		}else{
			return false;
		}
	} 

}