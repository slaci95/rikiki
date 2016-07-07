<?php
if (isset($_POST["fixersubmit"])) {
	$round = $_POST["round"];
	$name = mb_convert_case($_POST["player"], MB_CASE_LOWER, "UTF-8");
	$players = array_map('strtolower' , $_SESSION["players"]);
	$type = mb_convert_case($_POST["type"], MB_CASE_LOWER, "UTF-8");
	$value = $_POST["value"];
	if ($type == "tipp") {
		$type = "tip";
	}
	elseif ($type == "találat") {
		$type = "hit";
	}
	elseif ($type == "pont") {
		$type = "points";
	}
	foreach ($players as $id => $nev) {
		if ($nev == $name) {
			$name = $id;
			break;
		}
	}
	if (isset($_POST["halftime"])) {
		$round = $_SESSION["halftime"]+($_SESSION["halftime"]-$round)+1;
	}
	$_SESSION["round".$round][$name][$type] = $value;
	if ($_SESSION["round".$round][$name]["tip"] == $_SESSION["round".$round][$name]["hit"]) {
		$_SESSION["round".$round][$name]["points"] = 10+2*$_SESSION["round".$round][$name]["hit"];
	}
	
	if ($_SESSION["round".$round][$name]["tip"] > $_SESSION["round".$round][$name]["hit"]) {
		$_SESSION["round".$round][$name]["points"] = -2*($_SESSION["round".$round][$name]["tip"] - $_SESSION["round".$round][$name]["hit"]);
	}
	
	if ($_SESSION["round".$round][$name]["tip"] < $_SESSION["round".$round][$name]["hit"]) {
		$_SESSION["round".$round][$name]["points"] = -2*($_SESSION["round".$round][$name]["hit"] - $_SESSION["round".$round][$name]["tip"]);
	}
}
?>