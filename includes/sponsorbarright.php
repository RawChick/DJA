<?php
include('php/connection.php');

$link = mysqli_connect($host, $user, $password, $database);

$row = mysqli_fetch_array(mysqli_query($link, "SELECT COUNT(*) AS numRows FROM sponsorbar"), MYSQLI_ASSOC);
$halfRows = $row['numRows']/2;
$halfRows = floor($halfRows);
$query = "SELECT paths, url FROM sponsorbar ORDER BY datum DESC LIMIT 0, $halfRows";
$result = mysqli_query($link, $query);


echo " <div class='sponsorbar'>";
echo " <div class='sponsorbarright'>";
echo "<a href='http://www.kleinautomatisering.nl/' target='_blank'><img src='images/sponsors/kleinautomatisering.gif'></a><br><br><br>";	
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{ 
	$url = $row['url'];
if(substr($url, 0, 7) === 'http://'){
echo "<a href=".$row['url']." target='_blank'><img src='images/sponsors/".$row['paths']."'></a><br><br>";	
}else if(substr($url, 0, 8) === 'https://'){
echo "<a href=".$row['url']." target='_blank'><img src='images/sponsors/".$row['paths']."'></a><br><br>";
}else{
echo "<a href=http://".$row['url']." target='_blank'><img src='images/sponsors/".$row['paths']."'></a><br><br>";	
}
}

echo " </div></div>";
?>
</div>