<?php
	session_start();
?>
<html>

	<head>
		<title>
			Rikiki
		</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="style/index.css" />
		<script type="text/javascript" src="js/playerselect.js"></script>
	</head>
	
	<body>
		<header>
			Rikiki
		</header>
			
		<section class="playerselect">
				<form name="pselectform" action="game.php" id="pselectform" method="post">
					<input type="text" name="pselect1" id="pselect1" placeholder="1. Játékos" />
					<input type="radio" name="start" id="start1" checked="checked" value="1" />
					<input type="text" name="pselect2" id="pselect2" placeholder="2. Játékos" />
					<input type="radio" name="start" id="start2" value="2" />
					<input type="hidden" name="pselect3" id="pselect3" placeholder="2. Játékos" />
					<input type="radio" name="start" id="start3" value="3" style="display:none;" />
					<input type="hidden" name="pselect4" id="pselect4" placeholder="2. Játékos" />
					<input type="radio" name="start" id="start4" value="4" style="display:none;" />
					<input type="hidden" name="pselect5" id="pselect5" placeholder="2. Játékos" />
					<input type="radio" name="start" id="start5" value="5" style="display:none;" />
					<input type="hidden" name="pselect6" id="pselect6" placeholder="2. Játékos" />
					<input type="radio" name="start" id="start6" value="6" style="display:none;" />
					<input type="hidden" name="pselect7" id="pselect7" placeholder="2. Játékos" />
					<input type="radio" name="start" id="start7" value="7" style="display:none;" />
					<input type="hidden" name="pselect8" id="pselect8" placeholder="2. Játékos" />
					<input type="radio" name="start" id="start8" value="8" style="display:none;" />
					<input type="hidden" name="pselect9" id="pselect9" placeholder="2. Játékos" />
					<input type="radio" name="start" id="start9" value="9" style="display:none;" />
					<input type="hidden" name="pselect10" id="pselect10" placeholder="2. Játékos" />
					<input type="radio" name="start" id="start10" value="10" style="display:none;" />
					<div class="p_button" id="p_addbutton" onclick="inputadd()">Játékos hozzáadása</div>
					<button class="p_button" name="pselect_submit">Start</button>
				</form>
		</section>	
	</body>
</html>

<?php
if (isset( $_SESSION["hiba"])) {
?>
<script type="text/javascript"> alert ('Minimum 2 játékos!'); </script>
<?php
	unset($_SESSION["hiba"]);
}
?>