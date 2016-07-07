<?php
	session_start();
	$name = "../Matches/".time().".txt";
	$file = fopen ($name , "w");
	for ($x = 0 ; $x <= count($_SESSION["score_names"])-1; ++$x) {
		if ($x != count($_SESSION["score_names"])-1) {
			fwrite ($file , $_SESSION["score_names"][$x]."|".$_SESSION["score_points"][$x]."\r\n");
		}
		else {
			fwrite ($file , $_SESSION["score_names"][$x]."|".$_SESSION["score_points"][$x]);
		}
	}
	fclose($file);
	session_destroy();
	header("Location:../index.php");
?>