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

	@session_start();
	if(!isset($_SESSION['user'])){
		header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>

	<style>
		#login-controls {
			margin: 0 auto;
			border: 1px solod #cc;
			padding: 50px;
			width: 300px;
		}
		.error-text{
			color: #f00;
		}
		.button {
		    background-color: #4C0050; /* Purple */
		    border: none;
		    color: white;
		    padding: 10px 20px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		}

	</style>
</head>
<body>
<p>
	you are logged as   <?php echo $_SESSION['username'] ?> .
	</br>
	<a href="../index.php?op=logout">Logout</a>
</p>

<div id="login-controls">
	<h2 class="animated infinite bounce">ADD USER</h2>
	<?php if(@$_GET['err']==1){ ?>
		<div class ="error-text">Login incorrect</div>
	<?php } ?>
	<form method="POST" action="../controller/admin_controller.php">
		<p>Username: <br>
		<input  type="text" name="user">
		</p>
		<p>Password: <br>
		<input type="Password" name="pass">
		</p>
		<p>Type: <br>
		<input  type="text" name="type">
		</p>
		<input class="button"   type="submit" name="op" value="Add User" />

	</form>
</div>

</body>
</html>