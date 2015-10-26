<?php

function getDB() {
	$DBServer = 'mysql.2freehosting.com';
	$DBUser = 'u186891760_l0lno';
	$DBPass = 'big_password';
	$DBName = 'u186891760_l0l';

	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	if ($conn -> connect_error) {
		trigger_error('Database connection failed: ' . $conn -> connect_error, E_USER_ERROR);
	}
	return $conn;
}

function getCiv() {

	$db = getDB();
	$username = $_SESSION['username'];

	$sql = "SELECT civ_name, civ_type, civ_disp, civ_bonus FROM civ_l0l WHERE username=?";
	$stmt = $db -> prepare($sql);
	$stmt -> bind_param('s', $username);
	if (!$stmt -> execute()) {
		echo "Execute failed: (" . $db -> errno . ") " . $db -> error;
	}

	$stmt -> bind_result($civ_name, $civ_type, $civ_disp, $civ_bonus);
	if (!$stmt -> fetch()) {
		$stmt -> close();
		return false;
	} else {

		$_SESSION['civname'] = $civ_name;
		$_SESSION['civtype'] = $civ_type;
		$_SESSION['civdisp'] = $civ_disp;
		$_SESSION['civbonus'] = $civ_bonus;
		$stmt -> close();

	}
}

function getStats() {

	$db = getDB();
	$username = $_SESSION['username'];

	$sql = "SELECT money, population, science, faith, land FROM stats_l0l WHERE username=?";
	if(!$stmt = $db -> prepare($sql)){
		echo "Prepare failed: (" . $db->errno . ") " . $db->error;
	}
	if(!$stmt -> bind_param('s', $username)){
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	if (!$stmt -> execute()) {
		echo "Execute failed: (" . $db -> errno . ") " . $db -> error;
	}

	$stmt -> bind_result($money, $population, $science, $faith, $land);
	if (!$stmt -> fetch()) {
		$stmt -> close();
		return false;
	} else {

		$_SESSION['money'] = $money;
		$_SESSION['population'] = $population;
		$_SESSION['science'] = $science;
		$_SESSION['faith'] = $faith;
		$_SESSION['land'] = $land;
		$stmt -> close();

	}
}

function getBuildings() {

	$db = getDB();
	$username = $_SESSION['username'];

	$sql = "SELECT homes, barracks, shrines, markets, schools FROM buildings_l0l WHERE username=?";
	$stmt = $db -> prepare($sql);
	$stmt -> bind_param('s', $username);
	if (!$stmt -> execute()) {
		echo "Execute failed: (" . $db -> errno . ") " . $db -> error;
	}

	$stmt -> bind_result($homes, $barracks, $shrines, $markets, $schools);
	if (!$stmt -> fetch()) {
		$stmt -> close();
		return false;
	} else {

		$_SESSION['homes'] = $homes;
		$_SESSION['barracks'] = $barracks;
		$_SESSION['shrines'] = $shrines;
		$_SESSION['markets'] = $markets;
		$_SESSION['schools'] = $schools;
		$stmt -> close();

	}
}

function getUnits() {

	$db = getDB();
	$username = $_SESSION['username'];

	$sql = "SELECT explorers, preachers, scientists, workers, warriors FROM units_l0l WHERE username=?";
	$stmt = $db -> prepare($sql);
	$stmt -> bind_param('s', $username);
	if (!$stmt -> execute()) {
		echo "Execute failed: (" . $db -> errno . ") " . $db -> error;
	}

	$stmt -> bind_result($explorers, $preachers, $scientists, $workers, $warriors);
	if (!$stmt -> fetch()) {
		$stmt -> close();
		return false;
	} else {

		$_SESSION['explorers'] = $explorers;
		$_SESSION['preachers'] = $preachers;
		$_SESSION['scientists'] = $scientists;
		$_SESSION['workers'] = $workers;
		$_SESSION['warriors'] = $warriors;
		$stmt -> close();

	}

}
?>