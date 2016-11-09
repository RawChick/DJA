<?php	

include ('includes/header.html');
$link = mysqli_connect($host, $user, $password, $database);
if (isset($_GET['id'])) {
   
    $id = $_GET['id'];


$query = "SELECT * FROM `news` WHERE `ID` = $id";
$result = mysqli_query($link, $query);
}
$query2 = "SELECT * FROM `news` ORDER BY datum DESC";
$result2 = mysqli_query($link, $query2);
?>

<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
						<?php
						if(empty($_GET["id"])){

echo "<table width=100%>"; 

setlocale(LC_TIME, array('nl_NL.UTF-8','nl_NL@euro','nl_NL','dutch'));

while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
$time = strtotime($row["datum"]);
$myDate = date($time );


echo"<tr><td><a href=\"nieuws.php?id=".$row['ID']."\"><b>".strftime("%#d-%m-%Y", $myDate)."<br>".$row["titel"]."</b></a></td></tr>";		
}		

echo"</table>";

		
						}else {
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

					echo"	<h2><b>".$row["titel"]."</b></h2>
					</header>
					
					<content>
					<a href=\"nieuws.php\"><b>Naar overzicht..</b></a><br><br>
						<p>".$row["article"]."<br></p>

					</content>
				</article>";
					}
				}
					?>
</div>

<?php	

include ('includes/footer.html');

?>