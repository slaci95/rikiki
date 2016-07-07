<?php
	unset ($_SESSION["score_names"]);		
	unset ($_SESSION["score_points"]);
	$nevek = $_SESSION["players"];
	$pontok = $_SESSION["points"];
	$rendezett = $pontok;
	rsort($rendezett);
	$_SESSION["score_points"] = $rendezett;
	$logger = 0;
	foreach ($rendezett as $pont) {
		for ($logger = 0 ; $logger < count($nevek) ; ++$logger) {
			if ($pont == $pontok[$logger]) {
				$_SESSION["score_names"][] = $nevek[$logger];
				$pontok[$logger] += 10000;
				break;
			}
		}
	}
?>