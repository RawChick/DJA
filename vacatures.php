<?php	

include ('includes/header.html');
$link = mysqli_connect($host, $user, $password, $database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

$query = "SELECT * FROM `jobs` WHERE `ID` = $id";
$result = mysqli_query($link, $query);
} 
$query2 = "SELECT * FROM `jobs` ORDER BY datum DESC";
$result2 = mysqli_query($link, $query2);
?>

<div class= "bottomcontent">

				<article class="mainbar">	
						<header>
						
						<?php
						if(empty($_GET["id"])){
echo "<h2><b>Vacatures</b></h2>
					</header><br>";
if(!mysqli_num_rows($result2)>0){
	echo "<b>Er zijn op dit moment geen vacatures.</b>";

}else{

echo "<table width=100%>"; 

while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

$time = strtotime($row["datum"]);
$myDate = date($time );
setlocale(LC_TIME, array('nl_NL.UTF-8','nl_NL@euro','nl_NL','dutch'));

 
echo"<tr><td><a href=\"vacatures.php?id=".$row['ID']."\"><b>".strftime("%#d-%m-%Y", $myDate)." ".$row["title"]."</b></a></td></tr>";		
}		

echo"</table>";
}					
						}else {
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

					echo"	<h2><b>".$row["title"]."</b></h2>
					</header>
					
					<content>
					<a href=\"vacatures.php\"><b>Terug naar overzicht..</b></a><br><br>
						<p>".$row["info"]."<br></p>

					</content>
				</article>";
					}
				}
					?>
</div>

<?php	

include ('includes/footer.html');

?>