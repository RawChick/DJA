<?php   
	session_start();
	include ('includes/header.html');
?>
<div class= "bottomcontent">
  <article class="mainbar">   
    <header>
      <h2><b>Foto Uploader</b></h2>
      <br>
    </header>
    <content>

      <?php
        if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){
          $i=1;
          if (isset($_POST["newcategory"]) && !empty($_POST["newcategory"])) {
            $cat = addslashes($_POST["newcategory"]);
          }
          elseif ($_POST["category"] != "select") {
            $cat = $_POST["category"];
          }

          if(isset($cat) && !empty($cat)){
            $client_id="905df95b8d95480";
            $timeout = 30;

        	  foreach ($_POST as $name => $value) {
              if($name == "uploader_count" && $value == '0'){
                echo "<p style='color: #FF0000'><b>Upload een foto!</b></p>";
                echo "<p>Vergeet niet op ook up het knopje 'start upload' te klikken</p><br>";
                echo "Klik <a href='imageuploader.php'><b>hier</b></a> om het opnieuw te proberen.";
              } else {
        		    if( strpos( $name, "name" ) !== false ) {
        			    $tmpName = nl2br(htmlentities(stripslashes($value)));
                  // $tmpName is the file
                  // code for sending the image to imgur
                  $filename = "plupload/uploads/".$tmpName;
                  $handle = fopen($filename, "r");
                  $data = fread($handle, filesize($filename));
                  $pvars   = array('image' => base64_encode($data));
                  $curl = curl_init();
                  curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
                  curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
                  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
                  curl_setopt($curl, CURLOPT_POST, 1);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                  curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
                  $out = curl_exec($curl);
                  curl_close ($curl);
                  $pms = json_decode($out,true);
                  $url=$pms['data']['link'];
                  if($url!=""){
                    // SQL query die de afbeelding in de database zet 
                    $link = mysqli_connect($host, $user, $password, $database);
                    $sql = "INSERT INTO photoalbum(paths, category) VALUES ('$url', '$cat')"; 
                    $result = mysqli_query($link, $sql);
                    if($result){
                      unlink($filename);
                      echo "Foto ".$i." is succesvol geupload!<br>";
                    } else {
                      echo "Het opslaan van de foto's gaat fout. Neem contact op met de webmaster.";
                    }
                    $i++;
                  } else {
                    error_log("Imgur API upload goes wrong: ".$pms['data']['error'], 0);
                    echo "error: ".$pms['data']['error']."<br>";
                    //echo "<br>Er is iets misgegaan, neem contact op met de webmaster";
                    $i++;
                  } 
                }
              }
            } 
          } else {
            echo "<p style='color: #FF0000'><b>Vul een categorie in!</b></p>";
            echo "<a href='addphoto.php'><b>Ga terug en probeer opnieuw</b></a>";
            $i++;
          }
        }
      ?>
    </content>
  </article>
</div>

<?php   
  include ('includes/footer.html');
?>

