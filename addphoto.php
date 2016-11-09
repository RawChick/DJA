<?php	
session_start();
include ('includes/header.html');


?>

<!-- Modernizr -->
<script src="js/modernizr.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
$(".loader").fadeOut("slow");
})
</script>


</head>

<div class= "bottomcontent">

<article class="mainbar">	
<header>
<?php
if (empty($_SESSION['myemail'])) {
    echo "<h2><b> Inloggen</b> </h2><br></header>
    <content>
    <p>U bent niet ingelogd.<a href='inloggen.php'> Login</a>\n</p>\n";
} 
else 
{
    $sql2 = "SELECT email, function FROM users WHERE email = '".$_SESSION['myemail']."'";
    $result2 = mysqli_query($link, $sql2);
    $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    $function = $row['function'];
    
    if ($function == 'Admin' || $function == 'Trainer' || $function == 'RSC'){
        $sql3 = "SELECT DISTINCT category FROM photoalbum";
        $result3 = mysqli_query($link, $sql3);
        ?>
        <h2><b>Fotoalbum uploaden</b></h2>
        </header>				
        <content>
        <br>
        <div class="loader"></div>

        <b>Kies hieronder de afbeeldingen die u wil uploaden. Kies daarnaast een categorie <br>
        of vul een nieuwe categorie in (bijvoorbeeld: Kerstcross in Sprundel, 26-12)<br>
        <p style="color: red"> <u>U kunt maximaal 20 foto's tegelijk uploaden!</u></p></b>
        <b>Het uploaden van de foto's kan even duren, u wordt vanzelf doorgestuurd wanneer het klaar is.</b><br><br>
        <form action="addphoto.php" method = "POST" enctype="multipart/form-data">
        <b>Bestand:</b>
        <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" /><br><br>
        <b> Categorie: </b>
        <select name="category">
        <option value="select">Selecteer..</option>
        <?php 
        
        while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
            echo '<option value="'.$row3["category"].'">'.$row3['category'].'</option>';
        };
        
        ?>
        </select>
        <br><br>
        <b>Of vul een nieuwe categorie in:</b><br>
        <input type="text" name="newcategory"><br><br>
        <input type="submit" name="upload_image" value="Upload">
        <br><br>
        </form>

        <?php

        // Variable file waarin de geuploaden afbeelding informatie wordt opgeslagen
        $valid_formats = array("jpeg","jpg", "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP");
        $count = 0;

        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
            $folder = "/home/www/www.dja-zundert.nl/www/fotoalbum/images/"; // Upload directory
        
            if ($_POST["category"] != "select") {
                $cat = $_POST["category"];
            }

            elseif (isset($_POST["newcategory"]) && !empty($_POST["newcategory"])) {
                $cat = addslashes($_POST["newcategory"]);
            }

            if(isset($cat) && !empty($cat)){
                
                if (is_writable($folder)) {

                    // Loop $_FILES to exeicute all files
                    foreach ($_FILES['files']['name'] as $f => $name) {     

                        if ($_FILES['files']['error'][$f] == 4) {
                            continue; // Skip file if any error found
                        }          
                        
                        if ($_FILES['files']['error'][$f] == 0) {              
                            
                            if( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                                $message[] = "$name is not a valid format";
                                continue; // Skip invalid file formats
                            }
                
                            else { // No error found! Move uploaded files 
                                move_uploaded_file($_FILES["files"]["tmp_name"][$f], $folder.$name);

                                $file = '/home/www/www.dja-zundert.nl/www/fotoalbum/images/'.$_FILES['files']['name'][$f];             
                                $newname = $_FILES['files']['name'][$f];
                                $size = getimagesize($file); 

                                switch ($size['mime']) { 
                                    case "image/gif": 
                                    case "image/GIF":
                                    // $resize_image = $file."_resize.gif";
                                    // $resize_file = $newname."_resize.gif";
                                    $source = imagecreatefromgif($file);
                                    break; 
                                    case "image/jpeg":
                                    case "image/JPEG": 
                                    // $resize_image = $file."_resize.jpeg";
                                    // $resize_file = $newname."_resize.jpeg";
                                    $source = imagecreatefromjpeg($file);
                                    break; 
                                    case "image/png": 
                                    case "image/PNG":
                                                // $resize_image = $file."_resize.png";
                                                // $resize_file = $newname."_resize.png";
                                    $source = imagecreatefrompng($file);
                                    break; 
                                    case "image/bmp":
                                    case "image/BMP": 
                                                // $resize_image = $file."_resize.bmp";
                                                // $resize_file = $newname."_resize.bmp";
                                    $source = imagecreatefromwbmp($file);
                                    break; 
                                } 

                                $max_width = 800;
                                $max_height = 800;

                                list($width,$height) = getimagesize($file);

                                if ($height > $max_height) {
                                    $newwidth = ($max_height / $height) * $width;
                                    $newheight = $max_height;
                                }   
                                else 
                                {
                                    $newheight = $height;
                                }    

                                if ($width > $max_width) {
                                    $newheight = ($max_width / $width) * $height;
                                    $newwidth = $max_width;
                                } 
                                else 
                                {
                                    $newwidth = $width;
                                }


                                $thumb = imagecreatetruecolor($newwidth, $newheight);


                                imagecopyresampled($thumb, $source, 0,0,0,0, $newwidth, $newheight, $width, $height);
                                imagejpeg( $thumb, $file, 100 ); 

                                $out_image = addslashes(file_get_contents($file));
                                $count++; // Number of successfully uploaded file

                                // SQL query die de afbeelding in de database zet 
                                $link = mysqli_connect($host, $user, $password, $database);
                                $sql = "INSERT INTO photoalbum(paths, category) VALUES ('$newname', '$cat')"; 
                                $result = mysqli_query($link, $sql);

                                // Controle of de Query werkt. 



                            };
                        } 
                
                    } echo '<meta http-equiv="refresh" content="0;url=succes.php" />';
                }
                else 
                {
                    echo 'The file is not writable<br>';
                  //  echo getcwd(); 
                }
            } 
            else 
            {
                echo "Vul een categorie in!";
            }
        }
    }
    else 
    { 
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