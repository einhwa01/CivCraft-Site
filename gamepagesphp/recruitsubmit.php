<?php
session_start();
require_once '../dbaccess.php';
require_once '../functions.php';

getStats();
getUnits();

$unusedPop = $_SESSION['population'] - $_SESSION['explorers'] - $_SESSION['preachers'] - $_SESSION['scientists'] - $_SESSION['workers'] - $_SESSION['warriors'];

if ($_SERVER['REQUEST_METHOD'] = 'post') {

	$db = getDB();
	$user = $_SESSION['username'];
	$explorers = $_POST['explorers'] + $_SESSION['explorers'];
	$preachers = $_POST['preachers'] + $_SESSION['preachers'];
	$scientists = $_POST['scientists'] + $_SESSION['scientists'];
	$workers = $_POST['workers'] + $_SESSION['workers'];
	$warriors = $_POST['warriors'] + $_SESSION['warriors'];

	$sql = "SELECT id FROM units_l0l WHERE username=?";
	$stmt = $db -> prepare($sql);
	$stmt -> bind_param('s', $user);
	$stmt -> execute();

	if ($stmt -> fetch()) {
		if ($unusedPop >= ($_POST['explorers'] + $_POST['preachers'] + $_POST['scientists'] + $_POST['workers'] + $_POST['warriors'])) {
			$stmt -> close();
			$sql = "UPDATE units_l0l SET explorers=?, preachers=?, scientists=?, workers=?, warriors=? WHERE username=?";
			$stmt = $db -> prepare($sql);
			$stmt -> bind_param('iiiiis', $explorers, $preachers, $scientists, $workers, $warriors, $user);
			if (!$stmt -> execute()) {
				echo "Execute failed: (" . $db -> errno . ") " . $db -> error;
			}
			$_SESSION['explorers'] = $explorers;
			$_SESSION['preachers'] = $preachers;
			$_SESSION['scientists'] = $scientists;
			$_SESSION['workers'] = $workers;
			$_SESSION['warriors'] = $warriors;

			$message = "<P>You watch as your civilians begin to train.  They will be done in an hour. </P>";
		} else {
			$message = "You don't have enough free civilians!";
		}
	} else {
		$message = "Civ not created yet!";
	}
	$stmt -> close();
	
	$unusedPop = $_SESSION['population'] - $_SESSION['explorers'] - $_SESSION['preachers'] - $_SESSION['scientists'] - $_SESSION['workers'] - $_SESSION['warriors'];

	$jsonPhp = array('message' => $message, 'explorers' => $_SESSION['explorers'], 'preachers' => $_SESSION['preachers'], 'scientists' => $_SESSION['scientists'], 'workers' => $_SESSION['workers'], 'warriors' => $_SESSION['warriors'], 'unusedpop' => $unusedPop);
	
	
	echo json_encode($jsonPhp);
}
?>