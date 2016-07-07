<?php
	session_start();
?>

<html>
	<head>
		<title>
			Rikiki - Eredmény
		</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="style/result.css" />
	</head>
	
	<body>
		<section class="podium" style="font-size:30px; margin:auto; width:500px; margin-top:20px; text-align:center;">
			<table style="text-align:center; font-size:30px; width:500px; margin:auto; border-collapse:collapse; border:0;">
				<tr>
					<td>
					</td>
					<td style="background-color:gold; min-width:166px">
						<?php
							print $_SESSION["score_names"][0];
						?>
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td style="background-color:silver; min-width:166px">
						<?php
							print $_SESSION["score_names"][1];
						?>
					</td>
					<td>
					</td>
					<td style="background-color:#a67d3d; min-width:166px">
						<?php
							if (isset($_SESSION["score_names"][2])) {
							print $_SESSION["score_names"][2];
							}
							else {
								print "<hr style='width:20%; border-color:black;'>";
							}
						?>
					</td>
				</tr>
				<tr height="30px">
			
				</tr>
			</table>
				<?php
				if (isset($_SESSION["score_names"][0])) {
				?>
				<table style="background-color:white; text-align:center; border-collapse:collapse;border:5px solid black; border-radius:30px; font-size:18px; margin:auto; width:300px;">
							<?php
							for ($x = 0 , $names = count($_SESSION["score_names"]) ; $x <= $names-1 ; ++$x) {
							?>
								<tr>
									<td>
										<?php
											print $x+1;
										?>
									</td>
									<td>
										<?php
											print $_SESSION["score_names"][$x];
										?>
									</td>
									<td>
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
				<?php
				}
				?>
			
		</section>
		
		<section class="logger">
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
				}
				?>
			</tr>
			<?php
			}
			?>
		</table>
	</section>
	<a href="php/save.php"><button>Mentés</button></a>
	<a href="php/sessiondestroy.php"><button>Reset</button></a>
	</body>
</html>