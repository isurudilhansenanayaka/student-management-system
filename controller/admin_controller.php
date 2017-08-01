<?php 

session_start();
if(isset($_SESSION['type']) && isset($_SESSION['user'])){

	$type = $_SESSION['type'];
	
	switch ($type) {
		case 'admin':
			// admin contoller is here
			break;

		case 'student':
			header("Location:student_controller.php");
			break;
		default:
			header( 'location: ../index.php' ) ;
			break;
	}
	
 }
	
	// load the view
	require('../view/admin.php');

	require('../model/admin_model.php');
	require('../model/db_model.php');

	@$op = $_REQUEST['op'];

	$admin_controller = new AdminController();

	switch ($op) {
		case 'add_user':
			$admin_controller->addUser();
			break;
		
		default:
			//header("Location:../index.php");
			break;
	}

	
	class AdminController
	{
		protected static $db;
		protected static $admin;
		function __construct()
		{
			self::$db = new DB();
			self::$admin = new AdminModel();
		}

		function addUser(){
			
			$name = self::$db->quote($_POST['user']);
			$pass = self::$db->quote($_POST['pass']);
			$type = self::$db->quote($_POST['type']);

			$result = self::$admin->addUser($name,$pass,$type);

			if($result == 1){
				echo "user added ...";
			}else{
				echo "something wrong";
			}

		}


	}
 ?>

 