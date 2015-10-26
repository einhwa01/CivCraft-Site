
<?php 
session_start();
require_once 'dbaccess.php';
require_once 'functions.php';

 if ($_SERVER['REQUEST_METHOD'] = 'post') {
 	if (isset($_SESSION['id'])){
 		echo "You're already logged in";
 	}else{
		if (isset($_POST['usermail']) && isset($_POST['password'])) {
			$db = getDB();
			$email = $_POST['usermail'];
			$pass = $_POST['password'];
			
					
			$sql = "SELECT id, username, password FROM user_l0l WHERE email=?";
			$stmt = $db -> prepare($sql);
			$stmt -> bind_param('s', $email);
			if (!$stmt->execute()) {
    				echo "Execute failed: (" . $db->errno . ") " . $db->error;
			}
		
			$stmt -> bind_result($id, $username, $hash);
			if(!$stmt->fetch()){	
				echo "Email or Password is incorrect";			
			}else{
				if(checkPass($pass, $hash)){
					$_SESSION['username'] = $username;
					$_SESSION['id'] = $id;	
					$stmt -> close();			
					header("Location:main.php");
				}else{
					echo "Email or Password is incorrect";	
				}	
			}
			$stmt -> close();		
		}
	}	
 }
