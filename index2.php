	<?php	
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	session_start();

	include ('includes/header.html');
	include ('includes/slideshowfunction.php');
	include ('php/connection.php');

	?>

	<div id="wrapper">
		
		

		<?php

		$link = mysqli_connect($host, $user, $password, $database);

		$sql1 = "SELECT id, titel, article FROM news ORDER BY datum DESC LIMIT 1";
		$result1 = mysqli_query($link, $sql1);
		$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);


		$sql2 = "SELECT id, titel, article FROM news ORDER BY datum DESC LIMIT 1 OFFSET 1";
		$result2 = mysqli_query($link, $sql2);
		$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

		$sql3 = "SELECT id, titel, article FROM news ORDER BY datum DESC LIMIT 1 OFFSET 2";
		$result3 = mysqli_query($link, $sql3);
		$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);

		$sql4 = "SELECT id, titel, article FROM news ORDER BY datum DESC LIMIT 1 OFFSET 3";
		$result4 = mysqli_query($link, $sql4);
		$row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
		?>

		<div id="portfolio-wrapper">
			<div id="portfolio" class="container">
				<div id="column1">
					<div class="title">
						<h2>Fotoalbum</h2>
					</div>
					<p><img src="images/slideshow/dja-2.jpg" height="150px" width= "250px"/></p>
					<a href="fotoalbum.php" class="icon icon-arrow-right button"><div class="readmore"><img src="includes/images/white-arrow-right.png">  Ga naar album</div></a> 
				</div>
				<div id="column2">
					<div class="title">
						<h2>Nieuw bij DJA?</h2>
					</div>
					<div class="emptydiv">
						<p>Atletiek vereniging De Jonge Athleet  </p>
					</div>
					<a href="nieuwdja.php" class="icon icon-arrow-right button"><div class="readmore"><img src="includes/images/white-arrow-right.png">  Read More</div></a> 
				</div>

				<div id="column3">
					<div class="title">
						<h2>Vacatures</h2>
					</div>
					<div class="emptydiv">
						<p>Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Mauris quam enim, molestie.</p>
					</div>
					<a href="#" class="icon icon-arrow-right button"><div class="readmore"><img src="includes/images/white-arrow-right.png">  Lees meer</div></a> 
				</div>
					
				<div id="column4">
					<div class="title">
						<h2>Sponsors</h2>
					</div>
					<div class="emptydiv">
						<div class="sponsorbar">
							<?php include('includes/sponsorslide.php'); ?> 
						</div>
					</div>
					<a href="sponsorlijst.php" class="icon icon-arrow-right button"><div class="readmore"><img src="includes/images/white-arrow-right.png">  Sponsor overicht</div></a> 
				</div>
			</div>
		</div>


		<div id="page" class="container">
			<div id="content">
				<div class="title">
					<h2>Nieuws</h2>
					<span class="byline">Blijf altijd op de hoogte met het laatste nieuws</span> 
				</div>
				<ul class="style3">
					<li class="first">
						<h3><em><img src="includes/images/pic1.png" alt="" width="140" height="140" class="alignleft border" /></em><?php echo $row1['titel']; ?></h3>
						<div class="emptynewsdiv">
							<p><?php echo $row1['article']; ?></p>
						</div>
						<?php echo' <a href="http://www.dja-zundert.nl/nieuws.php?id='.$row1['id'].'">Lees verder</a>'; ?>
					</li>
					<li>
						<h3><em><img src="includes/images/pic2.png" alt="" width="140" height="140" class="alignleft border" /></em><?php echo $row2['titel']; ?></h3>
						<div class="emptynewsdiv">
							<p><?php echo $row2['article']; ?></p>
						</div>
						<?php echo' <a href="http://www.dja-zundert.nl/nieuws.php?id='.$row2['id'].'">Lees verder</a>'; ?>
					</li>
					<li>
						<h3><em><img src="includes/images/pic4.png" alt="" width="140" height="140" class="alignleft border" /></em><?php echo $row3['titel']; ?></h3>
						<div class="emptynewsdiv">
							<p><?php echo $row3['article']; ?></p>
						</div>
						<?php echo' <a href="http://www.dja-zundert.nl/nieuws.php?id='.$row3['id'].'">Lees verder</a>'; ?>
					</li>
					<li>
						<h3><em><img src="includes/images/pic3.png" alt="" width="140" height="140" class="alignleft border" /></em><?php echo $row4['titel']; ?></h3>
						<div class="emptynewsdiv">
							<p><?php echo $row4['article']; ?></p>
						</div>
						<?php echo' <a href="http://www.dja-zundert.nl/nieuws.php?id='.$row4['id'].'">Lees verder</a>'; ?>
					</li>
				</ul>
			</div>
			<div id="sidebar">
				<div class="box2">
					<div class="title">
						<h2>Agenda</h2>
					</div>
					<ul class="style2">
						<?php
						$query = "SELECT * FROM `agenda` WHERE `begindate` > SUBDATE(NOW(),1) OR `enddate` > SUBDATE(NOW(),1) ORDER BY `begindate` LIMIT 6";
						$result = mysqli_query($link, $query);
						
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
							$time = strtotime($row["begindate"]);
							$myDate = date($time );
							
							if(!empty($row['url'])){
								$url = $row['url'];
								if(substr($url, 0, 7) === 'http://' || substr($url, 0, 8) === 'https://'){
									$url = $row['url'];	
								} else {
									$url = "http://".$row['url'];	
								}

								if($row["enddate"] != $row["begindate"]){
									$endtime = strtotime($row["enddate"]);
									$endDate = date($endtime );
									$end = strftime("%#d-%m", $endDate);

									echo "<li><a href='".$url."' target='_blank'>".strftime("%#d-%m", $myDate)." t/m ".$end." ".$row["activity"]."</a></li>";
								} else {
									echo "<li><a href='".$url."' target='_blank'>".strftime("%#d-%m", $myDate)." ".$row["activity"]."</a></li>";
								}

							} else {
								if($row["enddate"] != $row["begindate"]){
									$endtime = strtotime($row["enddate"]);
									$endDate = date($endtime );
									$end = strftime("%#d-%m", $endDate);
									echo "<li> ".strftime("%#d-%m", $myDate)." t/m ".$end." ".$row["activity"]."</li>";
								} else {
									echo "<li>".strftime("%#d-%m", $myDate)." ".$row["activity"]."</li>";
								}
							}
						}
						?>

						<li><a href="agenda.php"><b>Lees meer..</b></a></li>			
					</ul>
				</div><br><br><br>
				<div class="box1">
					<div class="title">
						<h2>In het zonnetje</h2>
					</div>
					<ul class="list-style1">
						<li class="first">
							<?php
							$date = date("Y-m-d");
							$sql= "SELECT firstname, lastname FROM birthday
							WHERE DATE_FORMAT(STR_TO_DATE(`dateofbirth`, '%Y-%m-%d'), '%d-%m') = DATE_FORMAT(STR_TO_DATE('".$date."','%Y-%m-%d'), '%d-%m');";
							$result = mysqli_query($link, $sql);
							if(mysqli_num_rows($result) != 0){
								echo "<h5>Vandaag feliciteert DJA:</h5>";
							} 
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
								echo "<h4><i>".$row["firstname"]." ".$row["lastname"]."</i></h4>";
							} 
							echo"<br>";
							?>
							<p>
							<a href="ereleden.php"><b>Ereleden</b></a><br>
							<a href="records.php"><b>Clubrecords</b></a><br>
							<a href="lidvanverdienste.php"><b>Leden van verdienste</b></a></p>
						</li>
						<li>	
							<p><a href='http://www.kleinautomatisering.nl/' target='_blank'><img src='images/sponsors/kleinautomatisering.gif'></a></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php	
include ('includes/footer.html');
?>