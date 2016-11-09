<?php include ('includes/header.html'); ?>
<div class= "bottomcontent">
<article class="mainbar">

	<header>
		<h2><b>Clubrecord indienen</b></h2>
	</header>
	<br>
	<content>

<?php

$required = array('Naam' => 'name', 'E-mailadres' => 'email', 'Geboortedatum' => 'birthdate', 
	'Geslacht' => 'gender', 'Ondergrond' => 'ground');

$baseinfo = array('Naam' => 'name', 'E-mailadres' => 'email', 'Geboortedatum' => 'birthdate', 
	'Geslacht' => 'gender');

$typeinfo = array('Ondergrond' => 'ground');

$endinfo = array('Datum geleverde prestatie' => 'dateRecord',	'Accommodatie/Vereniging' => 'vereniging',
	'Plaats' => 'plaats', 'Link naar uitslagenlijst' => 'linkUitslagen',
	'Datum aanvraag clubrecord' => 'dateNow'); 

$error = false; # no errors yet

if($_POST['gender'] == 'Vrouw'){
	$required['Categorie'] = 'categoryF';
	$baseinfo['Categorie'] = 'categoryF';
	
	if ($_POST['categoryF'] == 'Masters vrouwen') {
		$required['Leeftijdscategorie'] = 'ageCategoryF';
		$baseinfo['Leeftijdscategorie'] = 'ageCategoryF';
	}

} elseif ($_POST['gender'] == 'Man') {
	$required['Categorie'] = 'categoryM';
	$baseinfo['Categorie'] = 'categoryM';
	
	if ($_POST['categoryM'] == 'Masters mannen'){
		$required['Leeftijdscategorie'] = 'ageCategoryM';
		$baseinfo['Leeftijdscategorie'] = 'ageCategoryM';
	}

}

if ($_POST['ground'] == 'Weg'){
	$required['Afstand'] = 'wegDistance';
	$required['Chipmeting'] = 'wegChip';
	$required['Gelopen tijd'] = 'wegTime';
	
	$typeinfo['Afstand'] = 'wegDistance';
	$typeinfo['Chipmeting'] = 'wegChip';
	$typeinfo['Gelopen tijd'] = 'wegTime';
}

if($_POST['ground'] == 'Baan'){
	$typesub = 'typesubB';
} elseif ($_POST['ground'] == 'Indoor') {
	$typesub = 'typesubI';
}

if ($_POST['ground'] == 'Baan' || $_POST['ground'] == 'Indoor'){
	$required['Type onderdeel'] = $typesub;
	$typeinfo['Type onderdeel'] = $typesub;


	if ($_POST[$typesub] == 'Lopen' || $_POST[$typesub] == 'Horden' 
		|| $_POST[$typesub] == 'Steeplechase'){
		$required['Afstand'] = 'distance';
		$required['Gelopen tijd'] = 'finishTime';

		$typeinfo['Afstand'] = 'distance';
		$typeinfo['Gelopen tijd'] = 'finishTime';
	}


	if ($_POST[$typesub] == 'Horden' || $_POST[$typesub] == 'Steeplechase'){
		$required['Hoogte hindernis'] = 'heightHindernis';
		$typeinfo['Hoogte hindernis'] = 'heightHindernis';
	}

	if ($_POST[$typesub] == 'Lopen' || $_POST[$typesub] == 'Horden'){
		$required['Elektronische tijdmeting'] = 'electroTime';
		$typeinfo['Elektronische tijdmeting'] = 'electroTime';

		if ($_POST['distance'] < 200 && $_POST['ground'] == 'Baan'){
			$required['Windmeting'] = 'windmeter';
			$typeinfo['Windmeting'] = 'windmeter';

			if ($_POST['windmeter'] == 'Ja'){
				$required['Windsnelheid'] = 'windSpeed';
				$typeinfo['Windsnelheid'] = 'windSpeed';
			}
		}
	}

	if ($_POST[$typesub] == 'Steeplechase'){
		$required['Waterbak aanwezig?'] = 'water';
		$typeinfo['Waterbak aanwezig?'] = 'water';
	}

	if ($_POST[$typesub] == 'Werpen'){
		$required['Werp onderdeel'] = 'throwSegment';
		$typeinfo['Werp onderdeel'] = 'throwSegment';
	}

	if ($_POST[$typesub] == 'Werpen'){
		$required['Werp onderdeel'] = 'throwSegment';
		$required['Afstand'] = 'distance';

		$typeinfo['Werp onderdeel'] = 'throwSegment';
		$typeinfo['Afstand'] = 'distance';
	}

	if($_POST[$typesub] == 'Werpen' && $_POST['throwSegment'] != 'selected'){
		if ($_POST['throwSegment'] == 'Speerwerpen'){
			$required['Gewicht werpmateriaal'] = 'throwWeightGram';
			$typeinfo['Gewicht werpmateriaal'] = 'throwWeightGram';
		} else {
			$required['Gewicht werpmateriaal'] = 'throwWeightKilo';
			$typeinfo['Gewicht werpmateriaal'] = 'throwWeightKilo';
		}
	}

	if ($_POST[$typesub] == 'Springen'){
		$required['Spring onderdeel'] = 'jumpSegment';
		$typeinfo['Spring onderdeel'] = 'jumpSegment';
	}

	if($_POST[$typesub] == 'Springen' && $_POST['jumpSegment'] != 'selected'){
		if ($_POST['jumpSegment'] == 'Polsstokhoogspringen' || $_POST['jumpSegment'] == 'Hoogspringen'){
			$required['Springhoogte'] = 'jumpHeight';
			$typeinfo['Springhoogte'] = 'jumpHeight';
		} else {
			$required['Afstand'] = 'distance';
			$typeinfo['Afstand'] = 'distance';
		}
	}

	if ($_POST[$typesub] == 'Meerkamp'){
		$meerkamp = array();

		for($i=0; $i < 10; $i++){
			$meerkamp["segment".$i] = $_POST["segment".$i]; 
			$meerkamp["performance".$i] = $_POST["performance".$i];
			$meerkamp["points".$i] = $_POST["points".$i];
			$meerkamp["misc".$i] = $_POST["misc".$i];
		}
	}
}

$required['Datum geleverde prestatie'] = 'dateRecord';
$required['Accommodatie/Vereniging'] = 'vereniging';
$required['Plaats'] = 'plaats';
$required['Link naar uitslagenlijst'] = 'linkUitslagen';
$required['Datum aanvraag clubrecord'] = 'dateNow'; 
$required['submit'] = 'submit';

foreach($required AS $key => $value){
	if(!isset($_POST[$value]) || empty($_POST[$value]) || $_POST[$value] == 'standard'){
		$error = true;
		echo "Veld '".$key."' mist!<br />";
	}
}

if($_POST[$typesub] == 'Meerkamp'){
	$required['Meerkamptabel'] = 'meerkampTable';
}

$serialized = htmlspecialchars(serialize($required));
session_start();
$_SESSION['required_list'] = $required;

if($error){
	echo "<br>Vult u alstublieft bovenstaande velden in.<br>";
	echo "<b><a href=\"javascript:history.go(-1)\">Ga terug naar formulier</a></b>";
	echo "</content>
	</article>
</div>";

include ('includes/footer.html');

} else {
	# All required fields are filled in, go on!! >>>>>>>>

	$_SESSION['meerkamp'] = $meerkamp;

	$basedocinfo = array();
	$typedocinfo = array();
	$enddocinfo = array();
	foreach($baseinfo AS $key => $value){
			$basedocinfo[$key] = $_POST[$value];
	}
	foreach($typeinfo AS $key => $value){
			$typedocinfo[$key] = $_POST[$value];
	}
	foreach($endinfo AS $key => $value){
			$enddocinfo[$key] = $_POST[$value];
	}
	$_SESSION['basedocinfo'] = $basedocinfo;
	$_SESSION['typedocinfo'] = $typedocinfo;
	$_SESSION['enddocinfo'] = $enddocinfo;
	echo '<b><meta http-equiv="refresh" content="0;URL=recordformsender.php" /></b>';

	echo "<br><b>Even geduld AUB</b>
</content>
	</article>
</div>";

include ('includes/footer.html');
}

?>
			
