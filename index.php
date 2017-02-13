<?php	

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
session_start();

include ('includes/header4.html');
include ('includes/slideshowfunction.php');
include ('php/connection.php');

?>

	<div class="topcontent">
	
		

				<article class="topleft">	
					<div class="outer">
						<div class="inner">
<a href="fotoalbum.php">
<img src="" name="SlideShow" alt="" border="0"  />
</a>	
</div>
</div>
				</article>

<aside class="topcenter">
	<article>
	<div class="topcenterchild"><h3><b>Nieuw bij DJA?</b></h3>
		Klik <a href="nieuwdja.php"><b>hier</b></a> voor meer informatie!<br><br>
		<h3><b>Vacatures</b></h3>
		Klik <a href="vacatures.php"><b>hier</b></a> voor de vacatures. <br><br>

	</div>
	</article>
</aside>

			
				<aside class="topright">
					<article>

<?php

$link = mysqli_connect($host, $user, $password, $database);
$query = "SELECT * FROM `agenda` WHERE `begindate` > SUBDATE(NOW(),1) OR `enddate` > SUBDATE(NOW(),1) ORDER BY `begindate` LIMIT 3";
$result = mysqli_query($link, $query);

?>
<div class="border">
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

if(!empty($row['url'])){

	$url = $row['url'];
	if(substr($url, 0, 7) === 'http://' || substr($url, 0, 8) === 'https://'){
		$url = $row['url'];	
	}else{
		$url = "http://".$row['url'];	
	}

if($row["enddate"] != $row["begindate"]){
$endtime = strtotime($row["enddate"]);
$endDate = date($endtime );
$endDateConfig = strftime("%#d %b", $endDate);
	$end = "t/m ".$endDateConfig;
	
echo "<tr>
    <td>".strftime("%#d %b", $myDate)." ".$end."</td>
    <td><a href='".$url."' target='_blank'>".$row["activity"]."</a></td>
  </tr>";
} else{

echo "<tr>
    <td>".strftime("%#d %B", $myDate)."</td>
    <td><a href='".$url."' target='_blank'>".$row["activity"]."<a href='".$url."' target='_blank'></td>
  </tr>
  ";
}
// if url = empty
} else {
if($row["enddate"] != $row["begindate"]){
$endtime = strtotime($row["enddate"]);
$endDate = date($endtime );
$endDateConfig = strftime("%#d %b", $endDate);
	$end = "t/m ".$endDateConfig;
	
echo "<tr>
    <td>".strftime("%#d %b", $myDate)." ".$end."</td>
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


} //end of while loop
  ?>
  <tr>
    <td colspan="2"><a href="agenda.php"><b>Lees meer..</b></a></td>
  </tr>
</table>
</div>
<a class="linkfoto" href="fotoalbum.php"><b>Ga naar het fotoalbum.. </b></a>

					</article>
				</aside>
</div>
<div class="bottomcontent">
				<article class="bottomleft">	
					<header>


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
					

			<div class="title">
				<h2><b><a href="nieuws.php">Nieuws</a></b></h2>
		</div>
				<ul class="style3">
				<li class="first">
					<h3><em><img src="includes/images/pic1.png" alt="" width="140" height="140" class="alignleft border" /></em><?php echo $row1['titel']; ?></h3>
					<div class="emptynewsdiv">
					<p><?php echo $row1['article']; ?></p></div>
		<?php echo' <a href="http://www.dja-zundert.nl/nieuws.php?id='.$row1['id'].'">Lees verder</a> </li>'; ?>
				<li>
					<h3><em><img src="includes/images/pic2.png" alt="" width="140" height="140" class="alignleft border" /></em><?php echo $row2['titel']; ?></h3>
					<div class="emptynewsdiv">
					<p><?php echo $row2['article']; ?></p></div>
		<?php echo' <a href="http://www.dja-zundert.nl/nieuws.php?id='.$row2['id'].'">Lees verder</a> </li>'; ?>
				<li>
					<h3><em><img src="includes/images/pic4.png" alt="" width="140" height="140" class="alignleft border" /></em><?php echo $row3['titel']; ?></h3>
					<div class="emptynewsdiv">
					<p><?php echo $row3['article']; ?></p></div>
		<?php echo' <a href="http://www.dja-zundert.nl/nieuws.php?id='.$row3['id'].'">Lees verder</a> </li>'; ?>
					<li>
					<h3><em><img src="includes/images/pic3.png" alt="" width="140" height="140" class="alignleft border" /></em><?php echo $row4['titel']; ?></h3>
					<div class="emptynewsdiv">
					<p><?php echo $row4['article']; ?></p></div>
		<?php echo' <a href="http://www.dja-zundert.nl/nieuws.php?id='.$row4['id'].'">Lees verder</a> </li>'; ?>
			</ul>
		
					
				</article>

	<article class="bottomright">
<?php
$date = date("Y-m-d");
$sql= "SELECT firstname, lastname FROM birthday
WHERE DATE_FORMAT(STR_TO_DATE(`dateofbirth`, '%Y-%m-%d'), '%d-%m') = DATE_FORMAT(STR_TO_DATE('".$date."','%Y-%m-%d'), '%d-%m');";

echo "<h2><b>In het zonnetje</b></h2>";
$result = mysqli_query($link, $sql);

echo "<div class='bottomrightupper'>";
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
</div>
<div class="sunshinefooter">
		<p>Klik <a href="ereleden.php"><b>hier</b></a> voor alle ereleden.</br></br>
		  Klik <a href="records.php"><b>hier</b></a> voor alle clubrecords.</br></br> Klik <a href="lidvanverdienste.php"><b>hier</b></a> voor alle leden van verdienste. </p>
</div>	
</article>
	
		
</div>
</body>
</div>
<?php	
include ('includes/footer.html');
?>