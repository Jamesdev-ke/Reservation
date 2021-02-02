<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mainhandler{
	//sanitizes the input
	public function sanitize_input($a)
	{
		$a = trim($a);
		$a = stripslashes($a);
		$a = htmlspecialchars($a);
		return $a;
	}
	//check if a color hex code is valid
	public function validate_hex($hex_code){
		if(strlen($hex_code) !== 7)
		{
			return "invalid";
		}
		else
		{
			//check if starts with #
			$fchar = substr($hex_code,0,1);
			if(strcmp($fchar,"#") === 0)
			{
				return "valid";
			}
			else
			{
				return "invalid";
			}
		}
	}
	//checks if a number is valid
	public function validate_number($a){
		if(is_numeric($a))
		{
			return "valid";
		}
		else
		{
			return "invalid";
		}
	}
	//checks if name is valid
	public function validate_name($a){
		$uname = $a;
		if(preg_match('([a-zA-Z]{3,100}\S*)',$uname))
		{
			$name_sec = substr($uname,0,1);
			if(filter_var($name_sec,FILTER_VALIDATE_INT) === FALSE)
			{
				return "valid";
			}
			else
			{
				//the first letter is an integer
				return "invalid-name";
			}
		}
		else
		{
			return "invalid-name";
		}
	}
	public function validate_fname($a)
	{
		$fname = $a;
		$response = $this->validate_name($fname);
		if(strcmp($response,"invalid-name") === 0)
		{
			return "invalid-lname";
		}
		else
		{
			return $response;
		}
	}
	public function validate_lname($a){
		$lname = $a;
		$response = $this->validate_name($lname);
		if(strcmp($response,"invalid-name") === 0)
		{
			return "invalid-lname";
		}
		else
		{
			return $response;
		}
	}
	//checks if email is valid
	public function validate_email($a){
		$email = $a;
		if(preg_match('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/',$email))
		{
			return "valid";
		}
		else
		{
			return "invalid-email";
		}
	}
	//check if password is valid
	public function validate_pass($a){
		$pass = $a;
		if(preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/',$pass))
		{
			return "valid";
		}
		else
		{
			return "invalid-pass";
		}
	}
	//checks if phone is valid
	public function validate_phone($a){
		//should not start with  0

		$phone = $a;
		$phone_section = substr($phone,0,1);
		if($phone_section == 0 || strcmp($phone_section,'+') === 0)
		{
			return "invalid-phone";
		}
		else
		{
			//check if length is less than 8
			if(strlen($phone) < 8)
			{
				return "invalid-phone";
			}
			else
			{
				//check if is numeric
				if(is_numeric($phone))
				{
					return "valid";
				}
				else
				{
					return "invalid-phone";
				}

			}
		}
	}
	//sanitizes and validates a url
	public function validate_url($url){
		$url = filter_var($url,FILTER_SANITIZE_URL);
		if(filter_var($url,FILTER_VALIDATE_URL))
		{
			return "valid";
		}
		else
		{
			return "invalid";
		}
	}
	//creates userid based on email and current time stamp
	public function generate_id($a){
		$email = $a;
		$userid = md5($email);
		$userid = $userid.uniqid();
		return $userid;
	}
	//gets current date-->dd/mm/yyyy
	public function current_date(){
		date_default_timezone_set("Africa/Nairobi");
		return date("d/m/Y");
	}
	//gets int date
	public function int_date($date){
		$dateObj = DateTime::createFromFormat('d/m/Y',$date);
		$int_date =  $dateObj->format('Ymd');
		return $int_date;
	}
	//gets int time
	public function int_time($time){
		$timeObj = DateTime::createFromFormat('h:i A',$time);
		$int_time = $timeObj->format('Hi');
		return $int_time;
	}
	//gets current time 24
	public function current_time_24hr($time1){
		$timeObj = DateTime::createFromFormat('h:i A',$time1);
		$time_24hr = $timeObj->format('H:i');
		return $time_24hr;
	}
	//gets current time-->hh:mm
	public function current_time(){
		date_default_timezone_set("Africa/Nairobi");
		return date("h:ia");
	}
	//gets current month-->dd/mm
	public function current_month(){
		date_default_timezone_set("Africa/Nairobi");
		return date("m/y");
	}
	//generate hash
	public function generate_hash($data){
		$data = password_hash($data,PASSWORD_DEFAULT);
		return $data;
	}
	//generate invoice no / receipt no ->based on current timestamp
	public function generate_invoice_no(){
		$invoice_no = abs(crc32(uniqid()));
		return $invoice_no;
	}
	//gets the future date from the given time frame
	function futureDate($time_frame){
		$duration = strtotime($time_frame);
		$future_date = date("d/m/y",$duration);
		return $future_date;
	}
	//gets the friendly date
	function f_date(){
		$monthNum = date("m");
		$dateObj = DateTime::createFromFormat('!m',$monthNum);
		$monthName = $dateObj->format('F');
		$monthName = substr($monthName,0,3);
		$monthName = ucfirst($monthName);
		$c_year = date("Y");
		$c_day = date("d");
		$f_date = $monthName." ".$c_day.",".$c_year;
		return $f_date;
	}
	//encrypt data-->mainly used to encrypt the sysid
	public function encrypt_data($data){
		$token = $data;
	    $cipher_method = 'aes-128-ctr';
	    $enc_key = 'CKXH2U9RPY3EFD70TLS1ZG4N8WQBOVI6AMJ5';
	    $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
	    $crypted_token = openssl_encrypt($token, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
	    unset($token, $cipher_method, $enc_key, $enc_iv);
	    return $crypted_token;
	}
	//decrypt data-->mainly used to decrypt the sysid
	public function decrypt_data($data){
		$crypted_token = $data;
	    list($crypted_token, $enc_iv) = explode("::", $crypted_token);;
	    $cipher_method = 'aes-128-ctr';
	    $enc_key = 'CKXH2U9RPY3EFD70TLS1ZG4N8WQBOVI6AMJ5';
	    $token = openssl_decrypt($crypted_token, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
	    unset($crypted_token, $cipher_method, $enc_key, $enc_iv);
	    return $token;
	}
	//check if a cookie is set -> determines a new visitor if cookie is not set
	public function  check_visitor_cookie(){
		$cookie_name = md5("visitor-tracker");
		if(isset($_COOKIE[$cookie_name]))
		{
			return "set";
		}
		else
		{
			return "unset";
		}
	}
	//check if the cookie value compares to the current date -> determines the daily visitors
	public function compare_visitor_cookie(){
		$cookie_name = md5("visitor-tracker");
		$current_date = $this->current_date();
		if($current_date == $_COOKIE[$cookie_name])
		{
			return "match";
		}
		else
		{
			return "mismatch";
		}
	}
	//cookie exopires after two months
	public function set_visitor_cookie(){
		$cookie_name = md5("visitor-tracker");
		setcookie($cookie_name,$this->current_date(),time() + (86400 * 60),"/");
	}
	//generate verification code
	public function generateCode(){
		return mt_rand(11111,99999);
	}
}
?>