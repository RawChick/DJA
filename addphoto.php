<?php   
  session_start();
  include ('includes/header.html');
?>

<script type="text/javascript">
  function validateForm() {
    var x = document.forms["myForm"]["category"].value;
    var y = document.forms["myForm"]["newcategory"].value;
    if (x == "select" && y == "") {
      alert("Vul een categorie in!");
      return false;
    }
  }
</script>
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
    <h4><b><u>Stap 1</u></b></h4>
    Kies hier een categorie voor je foto's, en klik op volgende.
    <br><br>
    <form id="form" name="categoryForm" method="post" onsubmit="return validateForm()" action="imageuploader.php">
      <b> Voeg foto's toe aan bestaande categorie: </b><br>
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
      <input type="submit" value="Volgende" />
    </form>



    <?php           
    } else { echo "<b>U heeft niet de juiste rechten om deze pagina te bezoeken</b>"; } }
    ?>

  </content>
</article>
</div>

<?php   
  include ('includes/footer.html');
?>
