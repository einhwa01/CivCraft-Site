<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: index.html");
}

require_once 'dbaccess.php';
require_once 'functions.php';

if (!$_POST['page'])
	die("0");

$page = $_POST['page'];

if (file_exists('gamepages/' . $page . '.php')) {

	//if the civilization is not created, we shouldn't let the user go anywhere
	// except the create screen
	if (!isset($_SESSION['civname'])) {
		echo file_get_contents('gamepages/civcreate.php');
	} else {
		ob_start();
		$file = 'gamepages/' . $page . '.php';
		include $file;
		ob_flush();
		// echo file_get_contents('gamepages/' . $page . '.html');
	}
} else
	echo 'There is no such page!';
?>
