<?php session_start(); ?>

<script language="javascript">
	function hideAll()  {  
	  document.getElementById("categoryF").style.display="none";
	  document.getElementById("categoryM").style.display="none";  
	  document.getElementById("ageCategoryF").style.display="none";   
	  document.getElementById("ageCategoryM").style.display="none";
	  document.getElementById("wegDistance").style.display="none";
    document.getElementById("wegChip").style.display="none";
    document.getElementById("wegTimeBruto").style.display="none";
    document.getElementById("wegTimeNetto").style.display="none";
	  document.getElementById("typesubI").style.display="none";   
	  document.getElementById("typesubB").style.display="none";   
		document.getElementById("jumpSegment").style.display="none";
		document.getElementById("throwSegmentI").style.display="none";
		document.getElementById("throwSegmentB").style.display="none";
		document.getElementById("throwWeightKilo").style.display="none";
		document.getElementById("throwWeightGram").style.display="none";
		document.getElementById("distance").style.display="none";
		document.getElementById("jumpHeight").style.display="none";
		document.getElementById("heightHindernis").style.display="none";
		document.getElementById("electroTime").style.display="none";
		document.getElementById("windmeter").style.display="none";
		document.getElementById("windSpeed").style.display="none";
		document.getElementById("waterBak").style.display="none";
		document.getElementById("finishTime").style.display="none";
		document.getElementById("endInfo").style.display="none";
		toggleBottom("none");
		toggleMeerkamp("none");
	}

	function addJumpSegment(){
		var option = document.createElement('option');
		option.text = option.value = "Hinkstapspringen";
		document.getElementById("jumpSegments").add(option, 2);
	}

	function createRequired(x){
		if (x == 'meerkampTable'){
			toggleMeerkamp('table-row');
		} else {
		ib = typeof x;
    document.getElementById(x).style.display="table-row";
  }
  }

	function toggleMeerkamp(x){
		document.getElementById("meerkampTable").style.display=x;
	}


	function checkWindMeting(d){
		var g = document.getElementById("ground");
		var ground = g.options[g.selectedIndex].value;
		if(ground == 'Baan'){
		var ib = document.getElementById("typesubBaan");
		var typeonderdeel = ib.options[ib.selectedIndex].value;
			if(typeonderdeel == 'Lopen' || typeonderdeel == 'Horden'){
				if(d.value < 201 && d.value >= 0){
					document.getElementById("windmeter").style.display="table-row";
				} else {document.getElementById("windmeter").style.display="none";}
			} else {document.getElementById("windmeter").style.display="none";}
		} else {document.getElementById("windmeter").style.display="none";}
	}

	function hola(x) {
	  if(x.value == 'Man') {
	   	document.getElementById("categoryF").style.display="none";
	   	document.getElementById("ageCategoryF").style.display="none";
	    document.getElementById("categoryM").style.display="table-row";
	  }

	  if(x.value == 'Vrouw') {
	  	document.getElementById("categoryM").style.display="none";
	   	document.getElementById("ageCategoryM").style.display="none"; 
	  	document.getElementById("categoryF").style.display="table-row";
	  }

	  if(x.value == 'Masters vrouwen')  {
	   	document.getElementById("ageCategoryM").style.display="none"; 
	    document.getElementById("ageCategoryF").style.display="table-row"; 
	  }

	  if(x.value == 'Masters mannen')  {
	   	document.getElementById("ageCategoryF").style.display="none"; 
	    document.getElementById("ageCategoryM").style.display="table-row";
	  }

	  if(x.value == 'Weg'){ 
	   	document.getElementById("typesubB").style.display="none";
	   	document.getElementById("typesubI").style.display="none";
	   	hideTypeSub();
	    document.getElementById("wegDistance").style.display="table-row";
	    document.getElementById("wegChip").style.display="table-row";
	    document.getElementById("wegTimeBruto").style.display="table-row";
	    toggleBottom("table-row");
		}

	  if(x.value == "Ja"){
	  	document.getElementById("windSpeed").style.display="table-row";
	  }
	  if(x.value == "Nee"){
	  	document.getElementById("windSpeed").style.display="none"; 
	  }

		if(x.value == 'Indoor' || x.value == 'Baan')  {
			toggleBottom("none");
	   	document.getElementById("wegDistance").style.display="none";
	    document.getElementById("wegChip").style.display="none";
		document.getElementById("wegTimeBruto").style.display="none";
   		document.getElementById("wegTimeNetto").style.display="none";

		  if(x.value == 'Baan'){
		  	document.getElementById("typesubI").style.display="none";
		  	document.getElementById("typesubB").style.display="table-row";
		  	var typesub = document.getElementById("typesubsB")
		  	var werpen = "WerpenB";
		  }
		  if(x.value == 'Indoor'){
		  	document.getElementById("typesubI").style.display="table-row";
		  	document.getElementById("typesubB").style.display="none";
		  	var typesub = document.getElementById("typesubsI");
		  	var werpen = "WerpenI";
		  }

		  var gender = document.querySelector('input[name="gender"]:checked').value;
	  	if(gender == 'Man'){
				var g = document.getElementById("categoriesM");
				var categoryG = g.options[g.selectedIndex].value;
				var masters = "Masters mannen";
	  	} else if(gender == 'Vrouw'){
	  		var g = document.getElementById("categoriesF");
				var categoryG = g.options[g.selectedIndex].value;
				var masters = "Masters vrouwen";
	  	}
			if(categoryG == masters){
				var option = document.createElement('option');
				option.text = "Werpen";
				option.value = werpen;
				typesub.add(option, 2);
	  	}
		}

	}

	function viewTypeSub(x){

				hideTypeSub();

		  if(x.value == "Lopen"){
	  	document.getElementById("distance").style.display="table-row";
	  	document.getElementById("electroTime").style.display="table-row";
	  	document.getElementById("finishTime").style.display="table-row";
	  	toggleBottom("table-row");
	  }

	  if(x.value == 'Horden'){
	  	document.getElementById("distance").style.display="table-row";
	  	document.getElementById("heightHindernis").style.display="table-row";
	  	document.getElementById("electroTime").style.display="table-row";
	  	document.getElementById("finishTime").style.display="table-row";
	  	toggleBottom("table-row");
	  }

	  if(x.value == 'Steeplechase'){
	  	document.getElementById("distance").style.display="table-row";
	  	document.getElementById("heightHindernis").style.display="table-row";
	  	document.getElementById("electroTime").style.display="table-row";
	  	document.getElementById("waterBak").style.display="table-row";	
	  	document.getElementById("finishTime").style.display="table-row";	
	  	toggleBottom("table-row");
	  }

	  if(x.value == 'Springen'){
	  	var jumpSegments = document.getElementById("jumpSegments");
	  	var gender = document.querySelector('input[name="gender"]:checked').value;
	  	if(gender == 'Man'){
				var g = document.getElementById("categoriesM");
				var categoryG = g.options[g.selectedIndex].value;
				var dJunioren = "D-junioren jongens";
	  	} else if(gender == 'Vrouw'){
	  		var g = document.getElementById("categoriesF");
				var categoryG = g.options[g.selectedIndex].value;
				var dJunioren = "D-junioren meisjes";
	  	}
			if(categoryG != dJunioren){
		  	addJumpSegment();
		  }
			document.getElementById("jumpSegment").style.display="table-row";
	  }

		if(x.value == 'WerpenI'){
			document.getElementById("throwSegmentI").style.display="table-row";		
		}
		if(x.value == 'WerpenB'){
			document.getElementById("throwSegmentB").style.display="table-row";
		}

	  if(x.value == 'Meerkamp'){
	  	toggleMeerkamp("table-row");
	  	toggleBottom("table-row");
	  }
	}

	function hideTypeSub(){
		  document.getElementById("throwWeightKilo").style.display="none";
			document.getElementById("throwWeightGram").style.display="none";
			document.getElementById("jumpHeight").style.display="none";
			document.getElementById("throwSegmentI").style.display="none";
			document.getElementById("throwSegmentB").style.display="none";
	  	document.getElementById("jumpSegment").style.display="none";
	  	document.getElementById("heightHindernis").style.display="none";
	  	document.getElementById("electroTime").style.display="none";
	  	document.getElementById("waterBak").style.display="none";	
	  	document.getElementById("finishTime").style.display="none";
	  	document.getElementById("distance").style.display="none";
	  	document.getElementById("windSpeed").style.display="none"; 
	  	document.getElementById("windmeter").style.display="none";
	  	toggleBottom("none");
	  	toggleMeerkamp("none");
	}



	function holaJump(x){
		if(x.value == 'Polsstokhoogspringen' || x.value == 'Hoogspringen'){
			document.getElementById("distance").style.display="none";
			document.getElementById("jumpHeight").style.display="table-row";
		} else {
			document.getElementById("distance").style.display="table-row";
			document.getElementById("jumpHeight").style.display="none";
		}
		toggleBottom("table-row");
	}

	function holaThrow(x){
		if(x.value == 'Speerwerpen'){
			document.getElementById("throwWeightGram").style.display="table-row";
			document.getElementById("throwWeightKilo").style.display="none";
		} else {
			document.getElementById("throwWeightGram").style.display="none";
			document.getElementById("throwWeightKilo").style.display="table-row";
		}
		document.getElementById("distance").style.display="table-row";
		toggleBottom("table-row");
	}

	function toggleBottom(x){
		document.getElementById("endInfo").style.display=x;
		document.getElementById("dateRecord").style.display=x;
		document.getElementById("vereniging").style.display=x;
		document.getElementById("plaats").style.display=x;
		document.getElementById("linkList").style.display=x;
		document.getElementById("dateNow").style.display=x;
		document.getElementById("submit").style.display=x;
		document.getElementById("captcha").style.display=x;
	}

	function toggleChip(x){
		if(x.value == 'Ja'){
    	document.getElementById("wegTimeNetto").style.display="table-row";
		}
		if(x.value == 'Nee'){
		document.getElementById("wegTimeNetto").style.display="none";
		}
	}

var timeOut;
		
function scrollToTop() {
	if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
		window.scrollBy(0,-50);
		timeOut=setTimeout('scrollToTop()',15);
	}
	else clearTimeout(timeOut);
}

</script>

<?php 

if(!isset($_SESSION['required_list'])){
	echo "<body id='top' onload='hideAll();'>";
}

include ('includes/header.html');
?>

<div class= "bottomcontent">

	<article class="mainbar">	
		<header>
			<h2><b>Nieuw Clubrecord</b></h2>
		</header>
		<br>
		<content>

			<b><u>LET OP: Deze pagina is nog niet in gebruik. Het invullen van dit formulier zal geen officiele aanvraag zijn.<br>
			Deze pagina wordt nog gebruikt om te testen.<br><br></u></b>

			Vul onderstaand formulier alstublieft volledig en juist in. <br>
  		Er dient een uitslagenlijst bijgevoegd te worden. Deze kunt u onderaan het formulier als link toevoegen.<br>
  		Heeft u geen link? Mail het dan alstublieft naar <a href="mailto:dja.clubrecords@gmail.com">dja.clubrecords@gmail.com</a>,
  		met uw naam en datum van opsturen erin.<br>
			Lees <b><a href="pdf/Richtlijnen CLUBRECORDS DJA, aangepast 25 juli 2016.pdf" target="_blank">hier</a></b> voor de richtlijnen van de clubrecords (versie juli 2016)<br>
			<br><p style="color: #FF0000"><b>INLEVEREN BINNEN 2 MAANDEN NA DATUM WEDSTRIJD</b></p>
			Dit formulier maakt gebruik van Javascript. Het formulier klapt uit naarmate u deze verder invult.<br>
			Als u alles heeft ingevuld, zal er onderaan een "verstuur" knop verschijnen.<br>
			Mocht dit niet lukken, download dan het formulier <b><a href="downloads/clubrecordformulier.docx" >hier</a></b>,
			en mailt u deze alstublieft naar <a href="mailto:dja.clubrecords@gmail.com">dja.clubrecords@gmail.com</a>.
			<br><br>

			<form action="recordformvalidation.php" method="POST" enctype="application/x-www-form-urlencoded" id="clubrecordform" name"clubrecordform">
				<table id='myTable' style="width:80%">

					<tr><td colspan="2"><b><u>Algemene gegevens</u></b></td></tr>
					<tr id="name">
		        <td>Naam</td>
		        <td> <input name="name" type="text" id="name"></td>
		      </tr>

					<tr id="email">
						<td>E-mailadres</td>
						<td><input name="email" type="text" id="email"></td>
					</tr>

					<tr id="birthdate">
						<td>Geboortedatum</td>
						<td><input name="birthdate" type="text" id="birthdate"> dd-mm-jjjj</td>
					</tr>

					<tr id="gender">
						<td>Geslacht</td>
						<td><input type="radio" name="gender" onclick="hola(this);" value="Man"> Man
				  	<input type="radio" name="gender" onclick="hola(this);" value="Vrouw"> Vrouw </td>
				  </tr>


		  		<tr id='categoryF'>
		  			<td>Categorie</td>
		  			<td><select name = "categoryF" id="categoriesF" onchange="hola(this);"> 
				    <option selected = "selected" value ="standard">Selecteer..</option>
				    <option value = "D-junioren meisjes">D-junioren meisjes</option>
				    <option value = "C-junioren meisjes">C-junioren meisjes</option>
				    <option value = "B-junioren meisjes">B-junioren meisjes</option>
				    <option value = "A-junioren meisjes">A-junioren meisjes</option>
				    <option value = "Senioren vrouwen">Senioren vrouwen</option>
				    <option value = "Masters vrouwen">Masters vrouwen</option>
						</select></td></tr>
					</tr>

					<tr id='categoryM'>
						<td>Categorie</td>
						<td><select name = "categoryM" id="categoriesM" onchange="hola(this);"> 
					    <option selected = "selected" value="standard">Selecteer..</option>
					    <option value = "D-junioren jongens">D-junioren jongens</option>
					    <option value = "C-junioren jongens">C-junioren jongens</option>
					    <option value = "B-junioren jongens">B-junioren jongens</option>
					    <option value = "A-junioren jongens">A-junioren jongens</option>
					    <option value = "Senioren mannen">Senioren mannen</option>
					    <option value = "Masters mannen">Masters mannen</option>
						</select></td>
					</tr>

					<tr id='ageCategoryF'>
						<td>Leeftijdscategorie</td>
						<td><select name="ageCategoryF"> 
					    <option selected = "selected" value = "standard">Selecteer..</option>
					   	<?php
					   	for($i=35; $i<101; $i= $i+5){
					    	echo "<option value='V".$i."'>V".$i."</option>";
					 	 	}
					    ?>
						</select></td>
					</tr>

					<tr id='ageCategoryM'>
						<td>Leeftijdscategorie</td>
						<td><select id="ageCategoryM" name="ageCategoryM"> 
					    <option selected="selected" value="standard">Selecteer..</option>
					   	<?php
					   	for($i=35; $i<101; $i= $i+5){
					    	echo "<option value='M".$i."'>M".$i."</option>";
					  	}
					    ?>
						</select></td>
					</tr>

					<tr><td colspan="2"><b><u>Clubrecord</u></b></td></tr>

					<tr>
          	<td>Ondergrond</td>
          	<td><select id="ground" name = "ground" onchange="hola(this);"> 
					    <option selected = "selected" value = "standard">Selecteer..</option>
					    <option value = "Weg">Weg</option>
					    <option value = "Baan">Baan</option>
					    <option value = "Indoor">Indoor</option>
						</select></td>
					</tr>
					
	      	<tr id="wegDistance">
	      		<td>Afstand</td>
	          <td><input name="wegDistance" type="text"> meter</td>
	        </tr>
 	      	<tr id="wegTimeBruto">	
 	      		<td>Gelopen tijd (bruto)</td>
	          <td><input name= "wegTimeBruto" type="text"> mm:ss</td>
	        </tr>
	        <tr id="wegChip">
	          <td>Chip tijdswaarneming?</td>
				<td><input type="radio" name="wegChip" onclick="toggleChip(this);" value="Ja"> Ja
				<input type="radio" name="wegChip" onclick="toggleChip(this);" value="Nee"> Nee </td>
			</tr>
			<tr id="wegTimeNetto">	
 	      		<td>Gelopen tijd (netto)</td>
	          <td><input name= "wegTimeNetto" type="text"> mm:ss</td>
	        </tr>

	        <tr id="typesubI">
	      		<td>Type onderdeel</td>
	          <td><select id="typesubsI" name = "typesubI" onchange="viewTypeSub(this);"> 
					    <option selected = "selected" value = "standard">Selecteer..</option>
					    <option value = "Lopen">Lopen</option>
					    <option value = "Springen">Springen</option>
					    <option value = "Horden">Horden</option>
					    <option value = "Meerkamp">Meerkamp</option>
						</select></td>
	        </tr>
	        <tr id="typesubB">
	      		<td>Type onderdeel</td>
	          <td><select id="typesubsB" name = "typesubBaan" onchange="viewTypeSub(this);"> 
					    <option selected = "selected" value = "standard">Selecteer..</option>
					    <option value = "Lopen">Lopen</option>
					    <option value = "Springen">Springen</option>
					    <option value = "Horden">Horden</option>
					    <option value = "Steeplechase">Steeplechase</option>
					    <option value = "Meerkamp">Meerkamp</option>
						</select></td>
	        </tr>
	        <tr id="jumpSegment">

	        	<td>Onderdeel</td>
	        	<td><select name = "jumpSegment" id = "jumpSegments" onchange="holaJump(this);"> 
					    <option selected = "selected" value = "standard">Selecteer..</option>
					    <option value = "Verspringen">Verspringen</option>
					    <option value = "Hoogspringen">Hoogspringen</option>
					    <option value = "Polsstokhoogspringen">Polsstokhoogspringen</option>
						</select></td>
	        </tr>

					<tr id="throwSegmentI">
	        	<td>Onderdeel</td>
	        	<td><select name = "throwSegmentI" onchange="holaThrow(this);"> 
					    <option selected = "selected" value = "standard">Selecteer..</option>
					    <option value = "Kogelstoten">Kogelstoten</option>
						</select></td>
	        </tr>	        

					<tr id="throwSegmentB">
	        	<td>Onderdeel</td>
	        	<td><select name = "throwSegmentB" onchange="holaThrow(this);"> 
					    <option selected = "selected" value = "standard">Selecteer..</option>
					    <option value = "Kogelstoten">Kogelstoten</option>
					    <option value = "Discuswerpen">Discuswerpen</option>
					    <option value = "Speerwerpen">Speerwerpen</option>
					    <option value = "Kogelslingeren">Kogelslingeren</option>
					    <option value = "Gewichtwerpen">Gewichtwerpen</option>
						</select></td>
	        </tr>	

	        <tr id="throwWeightKilo">
	        	<td>Gewicht werpmateriaal</td>
	        		<td><input name = "throwWeightKilo" type="text"> kilo</td>
	        	</td>
	        </tr>

	        <tr id="throwWeightGram">
	        	<td>Gewicht werpmateriaal</td>
	        		<td><input name= "throwWeightGram" type="text"> gram</td>
	        	</td>
	        </tr>

	        <tr id="distance">
	        	<td>Afstand</td>
	        		<td><input type="text" name="distance" onchange="checkWindMeting(this);"> meter</td>
	        	</td>
	        </tr>

	        <tr id="jumpHeight">
	        	<td>Springhoogte</td>
	        		<td><input name="jumpHeight" type="text"> meter</td>
	        	</td>
	        </tr>

	        <tr id="heightHindernis">
	        	<td>Hoogte hindernissen</td>
	        	<td><input name= "heightHindernis" type="text"> cm</td>

	        <tr id="electroTime">
	        	<td>Elektronische tijdswaarneming aanwezig?</td>
						<td><input type="radio" name="electroTime" value="Ja"> Ja
				  	<input type="radio" name="electroTime" value="Nee"> Nee </td>
 	      	</tr>

 	      	<tr id="windmeter">
 	      		<td>Windmeting aanwezig?</td>
 	      		<td><input type="radio" name="windmeter" onclick="hola(this);" value="Ja"> Ja
				  	<input type="radio" name="windmeter" onclick="hola(this);" value="Nee"> Nee </td>
 	      	</tr>

 	      	<tr id="windSpeed">
 	      		<td>Windsnelheid</td>
 	      		<td><input name = "windSpeed" type="text"> m/s</td>
 	      	</tr>

 	      	<tr id="waterBak">
 	      		<td>Waterbak aanwezig?</td>
 	      		<td><input type="radio" name="water" value="Ja"> Ja
				  	<input type="radio" name="water" value="Nee"> Nee </td>
 	      	</tr>

 	      	<tr id="finishTime">
 	      		<td>Gelopen tijd</td>
 	      		<td><input name= "finishTime" type="text"> mm:ss</td>
 	      	</tr>	

 	      	<tr id ="meerkampTable">
 	      		<td colspan="3">
 	      			<p style="color: #FF0000">Bij 'overige informatie' moet extra informatie ingevuld worden afhankelijk van het ingevulde onderdeel.
 	      			<br>Bijvoorbeeld: Afstand, hordenhoogte, gewicht werpmateriaal of windsnelheid.</p>
 	      			<table border="1" width="100%" class="meerkamp">
		 	      	<tr id="meerkampTitle"><th>Onderdeel</th><th>Prestatie</th><th>Punten</th><th>Overige informatie</th></tr>
								<?php
								for($i=0; $i < 10; $i++){
		 	      		echo"<tr id='meerkampRow".$i."'><td><input name='segment".$i."' type='text' placeholder='Vul hier onderdeel ".($i+1)." in..'></td>
		 	      			<td><input name='performance".$i."' type='text'></td>
		 	      			<td><input name='points".$i."' type='text'></td>
		 	      			<td><input name='misc".$i."' type='text'></td></tr>";
		 	      		}
								?>
							</table>
						</td>
					</tr>

 	      	<tr id="endInfo"><td colspan="2"><b><u>Overige informatie geleverde prestatie</u></b></td></tr>

 	      	<tr id="dateRecord">
 	      		<td>Datum geleverde prestatie</td>
 	      		<td><input name="dateRecord" type="text"> dd-mm-jjjj</td>
 	      	</tr>

 	      	<tr id="vereniging">
 	      		<td>Accommodatie / Vereniging</td>
 	      		<td><input name="vereniging" type="text"></td>
 	      	</tr>

					<tr id="plaats">
 	      		<td>Plaats</td>
 	      		<td><input name="plaats" type="text"></td>
 	      	</tr> 
 	      	
 	      	<tr id="linkList">
 	      		<td>Link naar uitslagenlijst</td>
 	      		<td><input name="linkUitslagen" type="text"></td>
 	      	</tr>

 	      	<tr id="dateNow">
 	      		<td>Datum aanvraag clubrecord</td>
 	      		<td><input name="dateNow" type="text" value="<?php echo date("d-m-Y", strtotime("now")); ?>"> dd-mm-jjjj</td>
 	      	</tr>	     

 	      	<tr id="captcha"> 	
 	      		<td> Beveiligingscode</td>
 	      		<td><img id="captcha_img" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
 	      			<a href="#" onclick="document.getElementById('captcha_img').src = '/securimage/securimage_show.php?' + Math.random(); return false"> 
 	      				<img height="23px" src="images/refresh.png"></a><br><br>
 	      			<input type="text" name="captcha" size="20" maxlength="6" placeholder="Typ bovenstaande code.."/>
						</td>
					</tr>
 	      	<tr id="submit"><td><input type="submit" name="submit" value="Verstuur"></td></tr>

       	</table>
      <form>
		</content>
	</article>
</div>

<?php	
if(isset($_SESSION['required_list'])){
	$required = $_SESSION['required_list'];
	echo "<script> hideAll(); </script>";

	foreach($required AS $key => $value){
		if($value == 'dateRecord' || $value =='vereniging' || 
	$value == 'plaats' || $value == 'linkUitslagen' || $value == 'dateNow' || $value == 'Verstuur' || $value == 'Captcha')continue;
		echo "<script> createRequired('".$value."'); </script>";
	}

	unset($_SESSION['required_list']);
	echo "<script> toggleBottom('table-row'); scrollToTop(); </script>";
}

include ('includes/footer.html');
?>