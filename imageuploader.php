<?php   
  session_start();
  include ('includes/header.html');
?>

<link rel="stylesheet" href="plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<!-- production -->
<script type="text/javascript" src="plupload/js/plupload.full.min.js"></script>
<script type="text/javascript" src="plupload/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<!-- NL translation -->
<script type="text/javascript" src="plupload/js/i18n/nl.js"></script>
</head>

<div class= "bottomcontent">
  <article class="mainbar">   
    <header>

      <?php
        if(empty($_SESSION['myemail'])) {
          echo "<h2><b> Inloggen</b> </h2><br></header>
          <content>
          <p>U bent niet ingelogd.<a href='inloggen.php'> Login</a>\n</p>\n";
        } else {
          $sql2 = "SELECT email, function FROM users WHERE email = '".$_SESSION['myemail']."'";
          $result2 = mysqli_query($link, $sql2);
          $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
          $function = $row['function'];
          
          if ($function == 'Admin' || $function == 'Trainer' || $function == 'RSC'){
            $sql3 = "SELECT DISTINCT category FROM photoalbum";
            $result3 = mysqli_query($link, $sql3);
            ?>

      <h2><b>Foto's uploaden</b></h2>
    </header>
    <content>
    <h4><b><u>Stap 2</u></b></h4>

    <?php 
      if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST["newcategory"]) && !empty($_POST["newcategory"])) {
          $cat = addslashes($_POST["newcategory"]);
        }
        elseif ($_POST["category"] != "select") {
          $cat = $_POST["category"];
        }
      }
      if(!isset($cat) || empty($cat)){
        echo "<b>Geen categorie ingevoerd!<br></b>";
        echo "<a href='addphoto2.php'>Naar stap 1</a>";
        echo "</article></div>";              
        include ('includes/footer.html');
        die();
      }

    ?>

In het vakje hieronder, klik op 'Bestanden toevoegen' om foto's te kiezen. Je kan ook foto's in het vakje slepen.<br>
Klik daarna op "Start upload". 

<form id="form" name="myForm" method="post" onsubmit="return validateForm()" action="dump.php">
    <div id="uploader"><br>
      <p><b>De browser die je gebruikt heeft geen Flash, Silverlight of HTML5 ondersteuning.</b></p>
      Werkt de uploader normaal gesproken wel? Probeer het dan later opnieuw
    </div>
</form>

<br>Wacht tot de uploader linksonderin zegt dat alle foto's zijn ge-upload (Bijvoorbeeld: "2/2 bestanden ge-upload")


 
<script type="text/javascript">
var category_val = <?php echo json_encode($cat); ?>;
// Initialize the widget when the DOM is ready
$(function() {
    // Setup html5 version
    $("#uploader").pluploadQueue({
        // General settings
        runtimes : 'html5,flash,silverlight,html4',
        url : "plupload/upload.php",
         
        chunk_size : '1mb',
        rename : true,
        dragdrop: true,
        max_retries: 2,
        multipart: true,
        multipart_params : {"category" : category_val},
         
        filters : {
            // Maximum file size
            max_file_size : '10mb',
            // Specify what files to browse for
            mime_types: [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip"}
            ],
        },
         // Flash settings
        flash_swf_url : 'plupload/js/Moxie.swf',
        // Silverlight settings
        silverlight_xap_url : 'plupload/js/Moxie.xap'
    });
});
</script>

<?php           
    } else { echo "<b>U heeft niet de juiste rechten om deze pagina te bezoeken</b>"; }
  }
  ?>

   </content>
</article>
</div>

<?php   
include ('includes/footer.html');
?>
