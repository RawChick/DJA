
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>


    <style>
        #slideshow {
           
        }

        #slideshow > div {
            position: absolute;
            left: 10px;
            right: 10px;
        }
    </style>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script>
        $(function() {

            $("#slideshow > div:gt(0)").hide();

            setInterval(function() {
              $('#slideshow > div:first')
                .fadeOut(1000)
                .next()
                .fadeIn(1000)
                .end()
                .appendTo('#slideshow');
            },  3000);

        });
    </script>
</head>

<body>
    <div id="slideshow">
<?php
include('/php/connection.php');



$sql = "SELECT paths FROM sponsorbar ";
    // Voer de query uit en sla het resultaat op 
    $link = mysqli_connect($host, $user, $password, $database);
    $result = mysqli_query($link, $sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{ 
echo "<div><img src='images/sponsors/".$row['paths']."'></div>";

}

?>

</div>
</body>
</html>

