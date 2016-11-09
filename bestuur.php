<?php	

include ('includes/header.html');
$link = mysqli_connect($host, $user, $password, $database);
$query = "SELECT ID, titel FROM `management` ORDER BY datum DESC LIMIT 4";
$result = mysqli_query($link, $query);
?>

<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
						<h2><b>Bestuur</b></h2>
					</header>
					
					<content>
						<p>
					<h3>Mededelingen</h3>
          <?php
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           echo" <a href='bestuursmededelingen.php?id=".$row['ID']."'>".$row['titel']."</a><br>";
          }

          ?>
<a href="bestuursmededelingen.php"><b>Meer mededelingen..</b></a><br>
<br>Vanaf heden rolstoel aanwezig bij DJA, staat in het materialenhok. <br><br>


<h3>Bestuursleden</h3>

    <table width="80%" border="0" cellspacing="0" cellpadding="0" id="bestuurtable">
      <tr>
        <td><img src="images/voorzitter_niels.jpg" alt="DJA voorzitter Niels van Namen" width="100" height="75" align="right" /></td>
        <td>Voorzitter Niels van Namen<br />
          Eldertstraat 22<br />
          4882 JH &nbsp;Zundert
          <br />
          <a href="mailto:voorzitter@dja-zundert.nl">voorzitter@dja-zundert.nl</a></td>
      </tr>
      <tr>
        <td><img src="images/secretaris_wesley.jpg" alt="DJA secretaris Wesley van Steen" width="100" height="75" align="right" /></td>
        <td>Secretaris Wesley van Steen<br />
          Nachtegaalstraat 32<br />
          4881 VE  &nbsp;Zundert
          <br />
          <a href="mailto:secretaris@dja-zundert.nl">secretaris@dja-zundert.nl</a></td>
      </tr>
      <tr>
        <td><img src="images/erik_klein.jpg" alt="" width="100" height="93" align="right" /></td>
        <td>Penningmeester Erik Klein<br />
          Akkermolenweg 15<br />
          4881 BL &nbsp;Zundert<br />
          <a href="mailto:penningmeester@dja-zundert.nl">penningmeester@dja-zundert.nl</a></td>
      </tr>
      <tr>
        <td><img src="images/bestuurslid_anouk_vermeiren.jpg" alt="" width="100" height="75" align="right" title="DJA Bestuurslid Anouk Vermeiren" /></td>
        <td>Bestuurslid Anouk Vermeiren<br />
Nachtegaalstraat 32<br />
4881 VE&nbsp; Zundert<br />
Tel. 06-42258401<br />
<a href="mailto:anouk@dja-zundert.nl">anouk@dja-zundert.nl</a></td>
      </tr>
      <tr>
        <td><img src="images/bestuurslid_ jeanne_van_den_ berg.jpg" alt="" width="100" height="75" align="right" /></td>
        <td>Bestuurslid Jeanne van den Berg<br />
          Jasmijnring 19<br />
          4881 HT&nbsp; Zundert  <br />
          <a href="mailto:jeanne@dja-zundert.nl">jeanne@dja-zundert.nl</a></td>
      </tr>
    </table>

						</p>

					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>