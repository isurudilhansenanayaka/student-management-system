<?php 

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: /error.php' ) );

    }

 
 class AdminModel
 {
 	
 	protected static $db;
	
	function __construct()
	{
		self::$db = new DB();
		
	}


 	function addUser($name,$pass,$type){

 		$password = $this->hashPassword($pass);
 
 		$query = "INSERT INTO `user` (`username`,`password`,`type`) VALUES (".$name.",".$password.",".$type.")";

		$result = self::$db->query($query);

		return $result;

 	}

 	function hashPassword($password){
 		//using bcrypt 
 		$option = ['cost' => 12];
 		$hash = password_hash($password,PASSWORD_BCRYPT,$option);
 		//add quotes
 		$h_password = "'" . $hash . "'";
 		return $h_password;
 	}
 }

?>