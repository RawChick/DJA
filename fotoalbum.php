<?php	

include ('includes/header.html');
$link = mysqli_connect($host, $user, $password, $database);
                            $sql2 = "SELECT datum FROM photoalbum GROUP BY YEAR(datum) DESC";
                            $result2 = mysqli_query($link, $sql2);
?>							

<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
						<h2><b>Fotoalbum</b></h2>
					</header>
					
					<content>
						<p><br><ul>
						<?php 
						
						while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
							$time = strtotime($row2["datum"]);
							$myDate = date($time);

							$enddate =  strftime("%Y", $myDate);
							echo "<b><h4>".$enddate."</h4></b>";

							$sql = "SELECT DISTINCT category FROM photoalbum WHERE YEAR(datum) =".$enddate." ORDER BY datum DESC"; 
                            $result = mysqli_query($link, $sql);

						 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						echo "<li><a href='fotoalbum/slider.php?id=".$row['category']."'>".$row['category']."</a></li>";
						}
						echo "<br>";
						}
						
						?>
						</ul></p>

					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>