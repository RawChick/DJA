<?php	

error_reporting(E_ERROR | E_PARSE);
session_start();

include ('includes/header.html');
include ('includes/slideshowfunction.php');

?>

	<div class="topcontent">
	
		

				<article class="topbar">	
<a href="fotoalbum.php">
<img src="images/slideshow/1367668683.jpg" name="SlideShow" alt="" border="0" width="100%" />
</a>	
				</article>

			
	
			
				<aside class="top-sidebar">
					<article>

<?php 

$sql = "SELECT * FROM agenda WHERE `begindate` > SUBDATE(NOW(),1) OR `enddate` > SUBDATE(NOW(),1) ORDER BY `begindate` LIMIT 3;";


$result = mysqli_query($conn, $sql);

?>

<table width="100%">
  <tr>
    <th width="40px"><b>Agenda</b></th>
    <th width="150px"></th>
  </tr>
  <?php
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{ 
$time = strtotime($row["begindate"]);
$myDate = date($time );

setlocale(LC_TIME, array('nl_NL.UTF-8','nl_NL@euro','nl_NL','dutch'));

if($row["enddate"] != $row["begindate"]){
$endtime = strtotime($row["enddate"]);
$endDate = date($endtime );
$endDateConfig = strftime("%#d %B", $endDate);
	$end = "t/m ".$endDateConfig;
	
echo "<tr>
    <td>".strftime("%#d %B", $myDate)." ".$end."</td>
    <td>".$row["activity"]."</td>
  </tr>";
} else{

echo "<tr>
    <td>".strftime("%#d %B", $myDate)."</td>
    <td>".$row["activity"]."</td>
  </tr>
  ";
}
}
  ?>
  <tr>
    <td colspan="2"><a href="agenda.php"><b>Lees meer..</b></a></td>
  </tr>
</table>

<a class="linkfoto" href="fotoalbum.php"><b>Ga naar het fotoalbum.. </b> &nbsp;  <img src="images/bekijk.png"></a>

					</article>
				</aside>
</div>
<div class="bottomcontent">
				<article class="bottombar">	
					<header>
						<h2><a href="nieuws.php"><b>Nieuws</b></a></h2>
					</header>

					<footer>
						<p></p>
					</footer>
					
					<content>
						<p>"Lorem ipsum dolor sit amet, </br>consectetur adipiscing elit, </br>
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</br>
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </br>
							nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in </br>
							reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </br>
							Excepteur sint occaecat cupidatat non proident, </br>
							sunt in culpa qui officia deserunt mollit anim id est laborum."<br></p>
				
							<a href="nieuws.php"><b>Meer nieuws..</b></a>

					</content>
				</article>

	<article class="bottom-sidebar">
<?php
$date = date("Y-m-d");
$sql= "SELECT firstname, lastname FROM birthday
WHERE DATE_FORMAT(STR_TO_DATE(`dateofbirth`, '%Y-%m-%d'), '%d-%m') = DATE_FORMAT(STR_TO_DATE('".$date."','%Y-%m-%d'), '%d-%m');";

echo "<h2><b>In het zonnetje</b></h2>";
$result = mysqli_query($conn, $sql);


	if(mysqli_num_rows($result) != 0){
echo "Vandaag feliciteert DJA:</br></br>";
} else {
	echo" <img src= images/zonnetje.gif height= 180px width= 180px>";
}
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{ 
echo $row["firstname"]." ".$row["lastname"]."</br>";
} 

?>

<div class="sunshinefooter">
		klik <a href="ereleden.php"><b>hier</b></a> voor alle ereleden.</br></br>
		Klik <a href="records.php"><b>hier</b></a> voor alle records. 
</div>	
</article>
	
		
</div>

<?php	
include ('includes/footer.html');
?>