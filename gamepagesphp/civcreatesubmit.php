<?php
require_once '../header.php';

if ($_SERVER['REQUEST_METHOD'] = 'post') {
	if (isset($_POST['civname'])) {
		$db = getDB();
		$user = $_SESSION['username'];
		$civname = $_POST['civname'];
		$civtype = $_POST['civtype'];
		$civdisp = $_POST['civdisp'];
		$civbonus = $_POST['civbonus'];

		$sql = "SELECT id FROM civ_l0l WHERE username=?";
		$stmt = $db -> prepare($sql);
		$stmt -> bind_param('s', $user);
		$stmt -> execute();

		$stmt -> bind_result($id);
		if ($stmt -> fetch()) {
			$stmt -> close();
			echo "Civ already created!";
		} else {
			$civtype = explode(":", $civtype);
			$civtype = $civtype[0];
			$civdisp = explode(":", $civdisp);
			$civdisp = $civdisp[0];
			$civbonus = explode(":", $civbonus);
			$civbonus = $civbonus[0];
			

			$sql = "INSERT INTO civ_l0l (username, civ_name, civ_type, civ_disp, civ_bonus) VALUES(?,?,?,?,?)";
			$stmt = $db -> prepare($sql);
			$stmt -> bind_param('sssss', $user, $civname, $civtype, $civdisp, $civbonus);
			if (!$stmt -> execute()) {
				echo "Execute failed: (" . $db -> errno . ") " . $db -> error;
			}
			$_SESSION['civname'] = $civname;			
			$_SESSION['civtype'] = $civtype;
			$_SESSION['civdisp'] = $civdisp;
			$_SESSION['civbonus'] = $civbonus;
			
			//initialize all others
			$sql = "INSERT INTO stats_l0l (username, money, population, science, faith, land) VALUES(?,500,10,0,0,10)";
			$stmt = $db -> prepare($sql);
			$stmt -> bind_param('s', $user);
			if (!$stmt -> execute()) {
				echo "Execute failed: (" . $db -> errno . ") " . $db -> error;
			}
			$sql = "INSERT INTO units_l0l (username, explorers, preachers, scientists, workers, warriors) VALUES(?,0,0,0,0,0)";
			$stmt = $db -> prepare($sql);
			$stmt -> bind_param('s', $user);
			if (!$stmt -> execute()) {
				echo "Execute failed: (" . $db -> errno . ") " . $db -> error;
			}
			$sql = "INSERT INTO buildings_l0l (username, homes, barracks, shrines, markets, schools) VALUES(?,0,0,0,0,0)";
			$stmt = $db -> prepare($sql);
			$stmt -> bind_param('s', $user);
			if (!$stmt -> execute()) {
				echo "Execute failed: (" . $db -> errno . ") " . $db -> error;
			}
			
			$stmt -> close();
		}

	}
}
?>