<?php	

include ('includes/header.html');
 	
if(date("m") == 11 || date("m") == 12){

$YEAR1 = date("Y");
$YEAR2 = date("Y")+1;

$DP1= date("Y")-5;
$DP2= date("Y")-6;

$CP1 = date("Y")-7;

$BP1 = date("Y")-8;

$AP1= date("Y")-9;
$AP2= date("Y")-10;

$DJ1= date("Y")-11;
$DJ2= date("Y")-12;

$CJ1= date("Y")-13;
$CJ2= date("Y")-14;

$BJ1= date("Y")-15;
$BJ2= date("Y")-16;

$AJ1= date("Y")-17;
$AJ2= date("Y")-18;

$S1 = date("Y")-19;
$M1 = date("Y")-34;

}else{

$YEAR1 = date("Y")-1;
$YEAR2 = date("Y");

$DP1= date("Y")-6;
$DP2= date("Y")-7;

$CP1 = date("Y")-8;

$BP1 = date("Y")-9;

$AP1= date("Y")-10;
$AP2= date("Y")-11;

$DJ1= date("Y")-12;
$DJ2= date("Y")-13;

$CJ1= date("Y")-14;
$CJ2= date("Y")-15;

$BJ1= date("Y")-16;
$BJ2= date("Y")-17;

$AJ1= date("Y")-18;
$AJ2= date("Y")-19;

$S1 = date("Y")-20;
$M1 = date("Y")-35;
}

?>

<div class= "bottomcontent">

  <article class="mainbar"> 
    <header>
      <h2><b>Categorie indeling <?php echo $YEAR2; ?></b></h2>
    </header>
	   	<content>
				<p>Categorie indeling lopende van 1 november <?php echo $YEAR1; ?> tot en met 31 oktober <?php echo $YEAR2; ?></p>
				<div class= "maintable">	  


        <table width="80%" border="1" cellspacing="3" cellpadding="3">
          <tr>
            <td width="30%">Mini of D-Pupillen</td>
            <td width="70%">geboren in <?php echo $DP1 ." en ".$DP2; ?></td>
          </tr>
          <tr>
            <td>C-Pupillen</td>
            <td>geboren in <?php echo $CP1; ?></td>
          </tr>
          <tr>
            <td>B-Pupillen</td>
            <td>geboren in <?php echo $BP1; ?></td>
          </tr>
          <tr>
            <td>A-Pupillen</td>
            <td>geboren in <?php echo $AP1 ." en ".$AP2; ?></td>
          </tr>
          <tr>
            <td>D-Junioren</td>
            <td>geboren in <?php echo $DJ1 ." en ".$DJ2; ?></td>
          </tr>
          <tr>
            <td>C-Junioren</td>
            <td>geboren in <?php echo $CJ1 ." en ".$CJ2; ?></td>
          </tr>
          <tr>
            <td>B-Junioren</td>
            <td>geboren in <?php echo $BJ1 ." en ".$BJ2; ?></td>
          </tr>
          <tr>
            <td>A-Junioren</td>
            <td>geboren in <?php echo $AJ1 ." en ".$AJ2; ?></td>
          </tr>
          <tr>
            <td>Senioren</td>
            <td>geboren in <?php echo $S1; ?> en eerder (vanaf 20 jaar tot en met 34 jaar)</td>
          </tr>
          <tr>
            <td>Masters</td>
            <td>geboren in <?php echo $M1; ?> en eerder (vanaf 35 jaar en ouder)</td>
          </tr>
        </table>
      <br>
      De categorie indelingen  lopen officiëel van 1 november tot en met 31 oktober. Het geboortejaar is bepalend voor de indeling in de categorie.<br />
      Doorschuiven naar een andere trainingsgroep gebeurt bij de DJA jeugd per 1 oktober. Dit valt dan samen met de wisseling van zomer- naar winterseizoen.
      <br>Zomerseizoen: 1 april t/m 30 september<br />
      Winterseizoen: 1 oktober t/m 31 maart
      <hr />
      Masters: Atleten en/of atletes die geboren zijn in 1980 of eerder. Zij dienen hun geboortedatum op te geven bij inschrijvingen. <br>Men wordt ingedeeld in de mastersklasse vanaf de dag dat men de mastersleeftijd heeft bereikt.
      <br>
      <br> V35:  Vrouwen 35 - 39 jaar<br />
        V40: 
      Vrouwen 40 - 44 jaar<br />
      V45: Vrouwen 45 - 49 jaar<br />
      etc.<br /><br>
      M35: Mannen 35 - 39 jaar<br />
      M40: Mannen 40 - 44 jaar<br />
      etc.</p>
</div>
					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>