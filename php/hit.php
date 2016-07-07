<?php
if (isset($_POST["hitsubmit"])) {
	$id = 0;
	$kor = $_SESSION["roundcounter"];
	foreach ($_POST as $hit) {
		$_SESSION["hit"][$id] = $hit;
		if ($hit != "Kör vége") {
			$_SESSION["round".$kor][$id]["hit"] = $hit;
		}
		++$id;
	}
	$id = 0;
	foreach ($_SESSION["tip"] as $tip) {
		if ($id != count($_SESSION["tip"])-1) {
			if ($tip == $_SESSION["hit"][$id]) {
				$_SESSION["points"][$id] = 0;
				$_SESSION["round".$kor][$id]["points"] = 10+2*$tip;
			}
			if ($tip < $_SESSION["hit"][$id]) {
				$_SESSION["points"][$id] = 0;
				$_SESSION["round".$kor][$id]["points"] = ($_SESSION["hit"][$id] - $tip)*-2;
			}
			if ($tip > $_SESSION["hit"][$id]) {
				$_SESSION["points"][$id] = 0;
				$_SESSION["round".$kor][$id]["points"] = ($tip - $_SESSION["hit"][$id])*-2;
			}
			++$id;
		}
	}
	foreach ($_SESSION["players"] as $nevid => $nev) {
		for ($count = 1 , $numb = $_SESSION["roundcounter"] ; $count <= $numb ; ++$count) {
			$_SESSION["points"][$nevid] += $_SESSION["round".$count][$nevid]["points"] ;
		}
	}
	
	unset ($_POST);
	$_SESSION["switcher"] = 0;
	$_SESSION["roundcounter"] += 1;
	if ($_SESSION["pstartercount"] != count($_SESSION["players"])-1) {
		++$_SESSION["pstartercount"];
		$_SESSION["pstarter"] = $_SESSION["players"][$_SESSION['pstartercount']];
	}
	else {
		$_SESSION["pstartercount"] = 0;
		$_SESSION["pstarter"] = $_SESSION["players"][$_SESSION['pstartercount']];
	}
	
}
?>