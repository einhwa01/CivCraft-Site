<?php

require_once 'dbaccess.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] = 'post') {
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['usermail'])) {
		$db = getDB();
		$user = $_POST['username'];
		$email = $_POST['usermail'];
		$pass = $_POST['password'];

		$sql = "SELECT id FROM user_l0l WHERE username=? or email=?";
		$stmt = $db -> prepare($sql);
		$stmt -> bind_param('ss', $user, $email);
		$stmt -> execute();

		$stmt -> bind_result($id);
		if ($stmt -> fetch()) {
			$stmt -> close();
			echo "Username or Email already in use";
		} else {
			$hash = hashPass($pass);
			$sql = "INSERT INTO user_l0l (username, password, email) VALUES(?,?,?)";
			$stmt = $db -> prepare($sql);
			$stmt -> bind_param('sss', $user, $hash, $email);
			if (!$stmt -> execute()) {
				echo "Execute failed: (" . $db -> errno . ") " . $db -> error;
			}
			$stmt -> close();
			header("Location:thanks.html");
		}

	}
}
