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
      if(empty($_SESSION['myemail'])) {
        echo "<h2><b> Inloggen</b> </h2><br></header>
        <content>
        <p style='color: #FF0000'><b>U bent niet ingelogd.</b></p>
        <a href='inloggen.php'><b>Login</b></a>\n";
      } else {
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
      <br><div class="loader"></div>



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

    // Loop $_FILES to exeicute all files
    foreach ($_FILES['file']['tmp_name'] as $index => $tmpName) {              
      if( !empty( $tmpName ) && is_uploaded_file( $tmpName ) ){
        // $tmpName is the file
        // code for sending the image to imgur
        $filename = $tmpName;
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
            echo "Foto ".$i." is succesvol geupload!";
          } else {
            echo "Query gaat fout bij foto ".$i;
          }
          $i++;
        } else {
         echo $pms['data']['error'];  
         echo "Er is iets misgegaan, bij foto ".$i;
         $i++;
        } 
      }
    } //echo '<meta http-equiv="refresh" content="0;url=succes.php" />';
  } else {
    echo "Geen categorie vanaf foto ".$i;
    echo "<p style='color: #FF0000'><b>Vul een categorie in!</b></p>";
    echo "<a href='addphoto.php'><b>Ga terug en probeer opnieuw</b></a>";
    $i++;
  }
}

} else { 
  echo "<p style='color: #FF0000'><b>U heeft niet de juiste rechten om deze pagina te bezoeken</b></p>"; 
  echo "<a href='index.php'><b>Terug naar hoofdpagina</b></a>";
  }
      }
      ?>

    </content>
  </article>

</div>

<?php 
  include ('includes/footer.html');
?>


