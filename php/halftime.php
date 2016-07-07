<?php
	if (isset($_SESSION["roundnumber"]) && $_SESSION["roundcounter"] > $_SESSION["roundnumber"]) {
		$_SESSION["halftime"] = $_SESSION["roundcounter"]-1;
		unset ($_SESSION["roundnumber"]);
	}
?>