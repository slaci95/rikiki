<?php
if (isset($_POST["pselect_submit"])) {
	
	//Ellenőrzés
	
	foreach ($_POST as $ertek) {
		if ($ertek != "") {
			switch ($ertek) {
				case 1:
				case 2:
				case 3:
				case 4:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
				case 10:
					break;
				default:
					$tomb[] = $ertek;
					break;
			}
		}
	}
	$szam = count ($tomb);
	if ($szam < 2) {
		$_SESSION["hiba"] = "Minimum 2 játékos!";
		unset ($_POST);
		header("Location:index.php");
	}
	
	//Játékosok létrehozása
	$id = 0;
	foreach ($_POST as $ertek) {
		if ($ertek != "") {
			switch ($ertek) {
				case 1:
					$_SESSION["pstarter"] = $ertek;
					break;
				case 2:
					$_SESSION["pstarter"] = $ertek;
					break;
				case 3:
					$_SESSION["pstarter"] = $ertek;
					break;
				case 4:
					$_SESSION["pstarter"] = $ertek;
					break;
				case 5:
					$_SESSION["pstarter"] = $ertek;
					break;
				case 6:
					$_SESSION["pstarter"] = $ertek;
					break;
				case 7:
					$_SESSION["pstarter"] = $ertek;
					break;
				case 8:
					$_SESSION["pstarter"] = $ertek;
					break;
				case 9:
					$_SESSION["pstarter"] = $ertek;
					break;
				case 10:
					$_SESSION["pstarter"] = $ertek;
					break;
				default:
					$_SESSION["players"][$id] = $ertek;
					$_SESSION["points"][$id] = 0;
			++$id;
			}
		}
	}
	foreach ($_SESSION["players"] as $id => $ertek) {
		if ($_SESSION["pstarter"] == $id+1) {
			$_SESSION["pstarter"] = $ertek;
			$_SESSION["pstartercount"] = 1;
			break;
		}
	}
	foreach ($_SESSION["players"] as $id => $ertek) {
		if ($ertek == $_SESSION["pstarter"]) {
			$_SESSION["pstartercount"] = $id;
			break;
		}
	}
	$cardnumber = count($_SESSION["players"]);
	$_SESSION["roundnumber"] = floor(51/$cardnumber);
	unset($_POST);
	$_SESSION["switcher"] = 0;
	$_SESSION["roundcounter"] = 1;
}

?>