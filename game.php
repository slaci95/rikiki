<?php
	session_start();
	include ("php/playerselect.php");
	include ("php/tip.php");
	include ("php/hit.php");
	include ("php/score.php");
	include ("php/fixer.php");
	include ("php/halftime.php");
?>

<html>
	<head>
		<title>
			Rikiki - Játék
		</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="style/game.css" />
	</head>
	
	<body>
		<section name="container" class="container">
			
			<div name="scorebox" class="scorebox">
				<table>
					<?php
					for ($x = 0 ; $x < count($nevek) ; ++$x) {
					?>
					<tr>
						<td>
							<?php
							print $_SESSION["score_names"][$x];
							?>
						</td>
						<td style="color:yellow">
							<?php
							print $_SESSION["score_points"][$x];
							?>
						</td>
						<td>
							pont
						</td>
					</tr>
					<?php
					}
					?>
				</table>
			</div>
			
			<?php
				if ($_SESSION["switcher"] == 0) {
			?>
				<div name="tip" class="tip">
					<form name="tip" method="post" action="">
						<table name="tip_table">
							<tr>
								<?php
								foreach ($_SESSION["players"] as $nevek) {
								?>
									<td style="text-align:center">
										<?php
										print $nevek;
										?>
									</td>
								<?php
								}
								?>
							</tr>
							<tr>
								<?php
								for ($counter = 1 , $szam = count($_SESSION["players"]) ; $counter <= $szam ; ++$counter) {
								?>
									<td style="text-align:center">
										<input type="text" class="tip_input" name="<?php print $counter-1;?>" maxlength="2" />
									</td>
								<?php
								}
								?>
							</tr>
							<tr>
								<td style="text-align:center" colspan="<?php $colspan = count($_SESSION["players"]); print $colspan?>">
									<input class="tip_submit" type="submit" name="tipsubmit" value="Tippelés" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			<?php
				}
					
				if ($_SESSION["switcher"] == 1) {
			?>
				<div name="hit" class="tip">
					<form name="hit" method="post" action="">
						<table class="tip_table">
							<tr>
								<?php
								foreach ($_SESSION["players"] as $nevek) {
								?>
									<td style="text-align:center">
										<?php
										print $nevek;
										?>
									</td>
								<?php
								}
								?>
							</tr>
							<tr>
								<?php
								for ($counter = 1 , $szam = count($_SESSION["players"]) ; $counter <= $szam ; ++$counter) {
								?>
									<td style="text-align:center">
										<input class="tip_input" type="text" name="<?php print $counter-1;?>" />
									</td>
								<?php
								}
								?>
							</tr>
							<tr>
								<td style="text-align:center" colspan="<?php $colspan = count($_SESSION["players"]); print $colspan?>">
									<input type="submit" style="width:auto;" class="tip_submit" name="hitsubmit" value="Kör vége" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			<?php
				}
			?>
			
			<div name="pstart" class="pstarter">
				<div class="pstarter_div" style="float:left; margin-left:10px">
					<?php
						print $_SESSION["pstarter"];
					?>
				</div>
				<div style="float:right; margin-right:30px;">
					<?php
						if (!isset($_SESSION["halftime"])) {
							print $_SESSION["roundcounter"];
						}
						elseif ($_SESSION["halftime"] == $_SESSION["roundcounter"]-1) {
							print $_SESSION["roundcounter"]-1;
						}
						else {
							print $_SESSION["halftime"]-(($_SESSION["roundcounter"]-1)-$_SESSION["halftime"]);
						}
					?>
				</div>
				<div style="clear:both">
				</div>
			</div>
			
			<div class="fixer">
					<p style="font-size:18px; color:white; margin:0; padding:0">
						Javító - Ha elrontottad...
					</p>
				<form name="fixer" action="" method="post">
					<input style="width:30px; text-align:center" type="text" name="round" placeholder="kör" maxlength="2" />
					<input style="width:85px; text-align:center" type="text" name="player" placeholder="játékos neve" />
					<input style="width:100px; text-align:center" type="text" name="type" placeholder="tipp,találat,pont" />
					<input style="width:40px; text-align:center" type="text" name="value" placeholder="érték" />
					<input type="checkbox" name="halftime" />
					<input type="submit" name="fixersubmit" style="visibility:hidden ; position:absolute;" />
				</form>
			</div>
			
			<div style="clear:both"></div>
			
			<div class="logger">
				<table>
					<tr>
						<td style="background-color:black">
						</td>
						<?php
						foreach ($_SESSION["players"] as $nevek) {
						?>
						<td class="logger_nevek" colspan="3" style="border-bottom:4px solid black">
							<?php
							print $nevek;
							?>
						</td>
						<?php
						}
						?>
					</tr>
					<tr>
						<td style="background-color:black">
						</td>
						<?php
						for ($counter = 0 ; $counter < count($_SESSION["players"]) ; ++$counter) {
						?>
						<td style="background-color:yellow; color:grey">
							Tipp
						</td>
						<td style="background-color:blue;">
							Találat
						</td>
						<td style="border-right:4px solid black; background-color:green;">
							Pont
						</td>
						<?php
						}
						?>
					</tr>
					<?php
					for ($kor = $_SESSION["roundcounter"] , $counter2 = 1 , $x = 1 ; $x < $kor ; ++$counter2 , ++$x) {
					?>
					<tr <?php if(isset($_SESSION["halftime"]) && $_SESSION["halftime"] == $x){ ?> style="border-bottom:3px solid red" <?php } else { ?> style="border-bottom:1px dotted black" <?php } ?> >
						<td style="background-color:grey">
							<?php
							if (isset($_SESSION["halftime"]) && $x-1 == $_SESSION["halftime"]) {
								print $_SESSION["halftime"];
							}
							elseif (isset($_SESSION["halftime"]) && $x > $_SESSION["halftime"]) {
								print ($_SESSION["halftime"] - ($x-$_SESSION["halftime"]))+1;
							}
							else {
								print $x;
							}
							?>
						</td>
						<?php
						for ($counter = 0 ; $counter < count($_SESSION["players"]) ; ++$counter) {
						?>
						<td style="background-color:yellow; color:grey">
							<?php
							print $_SESSION["round".$counter2][$counter]["tip"];
							?>
						</td>
						<td style="background-color:blue">
							<?php
							print $_SESSION["round".$counter2][$counter]["hit"];
							?>
						</td>
						<td style="background-color:green; border-right:4px solid black">
							<?php
							print $_SESSION["round".$counter2][$counter]["points"];
							?>
						</td>
						<?php
							if (isset($_SESSION["halftime"]) and ($_SESSION["halftime"] - ($x-$_SESSION["halftime"]))+1 == 1) {
							header ("Location:result.php");
							}
						}
						?>
					</tr>
					<?php
					}
					?>
				</table>
			</div>
		</section>
		<a href="php/sessiondestroy.php"><button>Reset</button></a>
	</body>
</html>