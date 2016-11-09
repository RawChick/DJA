<?php	

include ('includes/header.html');
$link = mysqli_connect($host, $user, $password, $database);
$query = "SELECT * FROM `sponsorbar`";
$result = mysqli_query($link, $query);


?>

<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
						<h2><b>Sponsors</b></h2>
					</header>
					
					<content>
						<br>
						<div class="sponsorbar">
							<div class="sponsorlijst">
						<?php

						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	
							echo "<a href='".$row['url']."'><img src='images/sponsors/".$row['paths']."'></a></br></br>";


						}
						?>
</div>
</div>
					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>