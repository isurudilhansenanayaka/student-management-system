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
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>student</title>
</head>
<body>
<p>
	you are logged as   <?php echo $_SESSION['username'] ?> .
  </br>
  <a href="../index.php?op=logout">Logout</a>
	</p>

</body>
</html>