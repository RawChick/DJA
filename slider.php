<?php 
	include "includes/header.html"; 
	$album = mysql_real_escape_string($_GET['album']);
	$year = mysql_real_escape_string($_GET['year']);
?>

<link rel="stylesheet" href="colorbox/colorbox.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="colorbox/jquery.colorbox.js"></script>
<script>
$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1', transition:"none", maxHeight:"80%", maxWidth:"80%", open:true});
			});
</script>
</head>
<body>
	<div class= "bottomcontent">
		<article class="mainbar">	
			<header>
				<?php echo "<h2><b>".$album."</b></h2>"; ?>
			</header>
			<br><br>
			<a href="fotoalbum.php"><b>Terug naar het overzicht</b></a>

			<?php
			$link = mysqli_connect($host, $user, $password, $database);
			$sql = "SELECT paths, category FROM photoalbum WHERE category = '".$album."' AND YEAR(datum) = ".$year;
			$result = mysqli_query($link, $sql);
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				if(substr($row['paths'], 0, 4) != 'http' && substr($row['paths'], 0, 8) != 'plupload' ){
					$extra = 'fotoalbum/images/';
				} else {
					$extra = '';
				}
				echo exif_read_data ($extra.$row['paths']);
				echo "<p><a class='group1' href='".$extra.$row['paths']."'></a></p>"; 
			}
			?>

		</article>
	</div>

	<?php
	include "includes/footer.html";	
	?>