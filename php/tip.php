<?php
if (isset($_POST["tipsubmit"])) {
	$id = 0;
	$kor = $_SESSION["roundcounter"];
	foreach ($_POST as $tip) {
		$_SESSION["tip"][$id] = $tip;
		if ($tip != "Tippelés") {
			$_SESSION["round".$kor][$id]["tip"] = $tip;
		}
		++$id;
	}
	unset ($_POST);
	$_SESSION["switcher"] = 1;
}
?>