<?php	
session_start();
include ('includes/header.html');
    ?>
<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
                        <?php
 if (empty($_SESSION['myemail'])) {
    echo "<h2><b> Inloggen</b> </h2><br></header>
    <content>
    <p>U bent niet ingelogd.<a href='inloggen.php'> Login</a>\n</p>\n";
} else {
    $sql2 = "SELECT email, function FROM users WHERE email = '".$_SESSION['myemail']."'";
$result2 = mysqli_query($link, $sql2);
$row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$function = $row['function']; 
if ($function == 'Admin' || $function == 'SponsorCommisie'){
?>
						<h2><b>Sponsor uploaden</b></h2>
					</header>
					
					<content>
<br>
<b>Kies hieronder een afbeelding van uw computer en vul de url van de website van de sponsor in (bijvoorbeeld www.dja-zundert.nl)</b><br><br>
<form action="addsponsor.php" method ="POST" enctype="multipart/form-data">
Bestand:
<input type ="file" name="image"> <br><br>
Website: 
<input type="text" name="url"><br><br>
<input type="submit" name="upload_image">
<br><br>
</form>

<?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST'){

// Variable file waarin de geuploaden afbeelding informatie wordt opgeslagen

if(!isset($_FILES['image']) || empty($_FILES['image'])){
   echo "Geen afbeelding geselecteerd";
} else {

$upload_image = $_FILES['image']['name'];

if(isset($upload_image)){

$folder = "/home/www/www.dja-zundert.nl/www/images/sponsors/";
if (is_writable($folder)) {
move_uploaded_file($_FILES['image']['tmp_name'], "$folder".$_FILES['image']['name']);

$file = '/home/www/www.dja-zundert.nl/www/images/sponsors/'.$_FILES["image"]["name"];
$uploadimage = $folder.$_FILES["image"]["name"];
$newname = $_FILES["image"]["name"];

$size = getimagesize($file); 

switch ($size['mime']) { 
    case "image/gif": 
        $resize_image = $folder.$newname."_resize.gif";
         $resize_file = $newname."_resize.gif";
$source = imagecreatefromgif($file);
        break; 
    case "image/jpeg": 
        $resize_image = $folder.$newname."_resize.jpeg";
         $resize_file = $newname."_resize.jpeg";
$source = imagecreatefromjpeg($file);
        break; 
    case "image/png": 
        $resize_image = $folder.$newname."_resize.png";
         $resize_file = $newname."_resize.png";
$source = imagecreatefrompng($file);
        break; 
    case "image/bmp": 
        $resize_image = $folder.$newname."_resize.bmp";
        $resize_file = $newname."_resize.bmp";
$source = imagecreatefromwbmp($file);
        break; 
} 

$max_width = 350;
$max_height = 350;

list($width,$height) = getimagesize($uploadimage);
$size=getimagesize($uploadimage);


if ($height > $max_height) {
        $newwidth = ($max_height / $height) * $width;
        $newheight = $max_height;
    }

    if ($width > $max_width) {
        $newheight = ($max_width / $width) * $height;
        $newwidth = $max_width;
    }

$thumb = imagecreatetruecolor($newwidth, $newheight);


imagecopyresized($thumb, $source, 0,0,0,0, $newwidth, $newheight, $width, $height);
imagejpeg( $thumb, $resize_image, 80 ); 

$out_image = addslashes(file_get_contents($resize_image));


$url = addslashes($_POST['url']);
// SQL query die de afbeelding in de database zet 
$link = mysqli_connect($host, $user, $password, $database);
if(!empty($out_image)){

    $sql = "INSERT INTO sponsorbar(paths, url) VALUES ('$resize_file', '$url')"; 
}else{
    $sql = "INSERT INTO sponsorbar(paths, url) VALUES ('$upload_image', '$url')"; 
}

$result = mysqli_query($link, $sql);
// Controle of de Query werkt. 

if ($result === true) { 
echo "<br><br><b>image geupload</b>"; 
}else{ 
echo "<br><br>fout met uploaden"; } 
} else {
    echo 'The file is not writable<br>';
    echo getcwd(); 
}
}
}
}
} else { 
    echo "<b>U heeft niet de juiste rechten om deze pagina te bezoeken</b>";
    }
?>

					</content>
				</article>
					
</div>

<?php	
}
include ('includes/footer.html');

?>