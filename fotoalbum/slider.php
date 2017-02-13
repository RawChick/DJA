<?php
include ('../includes/header2.html');
?>

<link rel="stylesheet" href="flexslider.css" type="text/css" media="screen" />

	<!-- Modernizr -->
  <script src="js/modernizr.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
  $(".loader").fadeOut("slow");
})
</script>
</head>
<div class= "contentfotoalbum">
        <article class="mainbarfotoalbum"> 
<div class="loader"></div>
 <?php 

$album = $_GET['id'];
        echo"         
          <header>
            <h2><b>".$album."</b></h2>
          </header>";
 if (!isset($_GET['id']))
{
    echo 'Er is geen album geselecteerd';
    exit;
} else {

$link = mysqli_connect($host, $user, $password, $database);
$sql = "SELECT paths, category FROM photoalbum WHERE category = '".$album."'";
$result = mysqli_query($link, $sql);

?>

<b><a href="../fotoalbum.php">Terug naar overzicht</a></b></br>
<div class="fotoalbum">

	<div id="main" role="main">
      <section class="slider">
        <div id="slider" class="flexslider">
          <ul class="slides">

<?php 
           while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
              if(substr($row['paths'], 0, 4) == 'http'){
                echo "<li><img src='".$row['paths']."'/></li>";  
              } elseif (substr($row['paths'], 0, 8) == 'plupload'){
                echo "<li><img src='../".$row['paths']."'/></li>";
              } else {
                echo "<li><img src='images/".$row['paths']."'/></li>";
              }
           }
?>
          </ul>
        </div>

      </section>
      <aside>
        </div>


  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>


  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="js/shCore.js"></script>
  <script type="text/javascript" src="js/shBrushXml.js"></script>
  <script type="text/javascript" src="js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script defer src="js/demo.js"></script>

  </article>
  </div>        
</div>

<?php 
}
include ('../includes/footer2.html');

?>