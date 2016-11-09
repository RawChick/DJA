<?php	

include ('includes/header.html');

?>

<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
						<h2><b>Geschiedenis</b></h2>
					</header>
					
					<content>

</br>
DJA bestaat al meer dan 50 jaar. In die 50 jaar is natuurlijk heel wat voorgevallen, je kunt spreken van een rijke historie.</br>
In deze historie kunnen we heel wat wetenswaardig heden, niet te vergeten momenten, nu nog memorabele gebeurtenissen en ook niemendalletjes noteren. </br>
Vanaf nu zal wekelijks een terugblik worden gepresenteerd. De bronnen die daarvoor zijn geraadpleegd zijn:
<ul>
<li>Zundert 100 jaar Sport.</li>
<li>Archief DJA.</li>
<li>Samenvatting gemaakt door Marlies van Geel over de eerste 40 jaar.</li>
<li>Gesprekken met de “oude garde”.</li>
</ul></br>
						Klik hieronder op een jaartal om meer informatie uit dit jaar te zien.</br>
						 <p><table width="20%" border="1" cellspacing="0" cellpadding="3" bordercolor="#359c6c">
       	
</br>
       	<tr>
        <?php
        for( $i = 2011; $i >= 2007; $i--){
        	echo "<td><a href='geschiedenis/".$i.".php'>".$i."</a></td>";
        }

           
        echo"</tr>
        <tr>";
         
        for( $i = 2006; $i >= 2002; $i--){
        	echo "<td><a href='geschiedenis/".$i.".php'>".$i."</a></td>";
        }

           
        echo"</tr>
        <tr>";

        for( $i = 2001; $i >= 1997; $i--){
        	echo "<td><a href='geschiedenis/".$i.".php'>".$i."</a></td>";
        }

           
        echo"</tr>
        <tr>";

        for( $i = 1996; $i >= 1992; $i--){
        	echo "<td><a href='geschiedenis/".$i.".php'>".$i."</a></td>";
        }

           
        echo"</tr>
        <tr>";

        for( $i = 1991; $i >= 1987; $i--){
        	echo "<td><a href='geschiedenis/".$i.".php'>".$i."</a></td>";
        }

        
        echo "</tr>
        <tr>";
         
        for( $i = 1986; $i >= 1982; $i--){
        	echo "<td><a href='geschiedenis/".$i.".php'>".$i."</a></td>";
        }


		echo"</tr>
        <tr>";
		
		for( $i = 1981; $i >= 1977; $i--){
        	echo "<td><a href='geschiedenis/".$i.".php'>".$i."</a></td>";
        }


		echo"</tr>
        <tr>";

        for( $i = 1976; $i >= 1972; $i--){
        	echo "<td><a href='geschiedenis/".$i.".php'>".$i."</a></td>";
        }


		echo"</tr>
        <tr>";

        for( $i = 1971; $i >= 1967; $i--){
        	echo "<td><a href='geschiedenis/".$i.".php'>".$i."</a></td>";
        }


		echo"</tr>
        <tr>";

        for( $i = 1966; $i >= 1962; $i--){
        	echo "<td><a href='geschiedenis/".$i.".php'>".$i."</a></td>";
        }


echo"</tr>
        <tr>";




        ?>   
        


      </table></p>
      </br>
  </br>
Noot: De terugblik is natuurlijk een persoonlijke inschatting van wat mogelijk interessant zou kunnen zijn voor leden en oud-leden.</br>
Ook worden feiten / beslissingen gememoreerd die nu nog bestaan en daardoor is het mogelijk om de ontwikkeling daarvan in de jaren volgend te laten zien. </br>
 Mocht er inhoudelijk commentaar en of correcties zijn, stuur deze dan naar:</br>
Harry van Hasselt e-mail:  <a href="mailto:h.c.v.hasselt@home.nl">h.c.v.hasselt@home.nl</a></br>
Ook jaarverslagen en of bestuursnotulen over de periode 1965 – 1980 zijn welkom.</br>

					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>