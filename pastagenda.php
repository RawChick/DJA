
<?php 

include ('includes/header.html');

?>

        <article class="bottomcontent"> 
          
          <content>
            <?php 
$link = mysqli_connect($host, $user, $password, $database);
$query = "SELECT * FROM agenda WHERE `begindate` < NOW() - INTERVAL 1 DAY AND `enddate` < NOW() - INTERVAL 1 DAY AND `enddate` > NOW() - INTERVAL 1 YEAR ORDER BY `begindate` DESC;";


$result = mysqli_query($link, $query);

?>
<div class="border">
<table width="100%">
  <tr>
    <th width="40px"><b>Agenda</b></th>
    <th width="150px"></th>
  </tr>
  <?php
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{ 
 $time = strtotime($row["begindate"]);
    $myDate = date($time );

    setlocale(LC_TIME, array('nl_NL.UTF-8','nl_NL@euro','nl_NL','dutch'));

    if(!empty($row['url'])){

    $url = $row['url'];
    if(substr($url, 0, 7) === 'http://' || substr($url, 0, 8) === 'https://'){
        $url = $row['url']; 
      }else{
        $url = "http://".$row['url']; 
    }

      
    if($row["enddate"] != $row["begindate"]){
        $endtime = strtotime($row["enddate"]);
        $endDate = date($endtime );
        $endDateConfig = strftime("%#d %B %Y", $endDate);
          $end = "t/m ".$endDateConfig;
          
        echo "<tr>
            <td>".strftime("%#d %B", $myDate)." ".$end."</td>
            <td><a href='".$url."' target='_blank'>".$row["activity"]."</a></td>
          </tr>";
      } else{

        echo "<tr>
            <td>".strftime("%#d %B %Y", $myDate)."</td>
            <td><a href='".$url."' target='_blank'>".$row["activity"]."</a></td>
          </tr>
          ";
        }
    

    } else {
        if($row["enddate"] != $row["begindate"]){
        $endtime = strtotime($row["enddate"]);
        $endDate = date($endtime );
        $endDateConfig = strftime("%#d %B %Y", $endDate);
          $end = "t/m ".$endDateConfig;
          
        echo "<tr>
            <td>".strftime("%#d %B", $myDate)." ".$end."</td>
            <td>".$row["activity"]."</td>
          </tr>";
      } else{

        echo "<tr>
            <td>".strftime("%#d %B %Y", $myDate)."</td>
            <td>".$row["activity"]."</td>
          </tr>
          ";
        }
      }
}
  ?>
  <tr>
    <td colspan="2"><a href="agenda.php"><b>Bekijk hier geplande activiteiten..</b></a></td>
  </tr>
</table>
</div>
          </content>
        </article>
          


<?php 

include ('includes/footer.html');

?>