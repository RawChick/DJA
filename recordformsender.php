<?php include ('includes/header.html'); ?>

<div class= "bottomcontent">

	<article class="mainbar">	
		<header>
			<h2><b>Clubrecord ingediend</b></h2>
		</header>
		<br>
		<content>

<?php
session_start();

function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $body) {
$file = $path.$filename;
$file_size = filesize($file);
$handle = fopen($file, "r");
$content = fread($handle, $file_size);
fclose($handle);

$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
$name = basename($file);

$eol = PHP_EOL;

// Basic headers
$header = "From: ".$from_name." <".$from_mail.">".$eol;
$header .= "Reply-To: ".$replyto.$eol;
$header .= "MIME-Version: 1.0\r\n";
$header .= "X-Mailer: PHP v".phpversion().$eol;
$header .= "X-Originating-IP: ".$_SERVER['REMOTE_ADDR'].$eol;
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"";

// Put everything else in $message
$message = "--".$uid.$eol;
$message .= "Content-Type: text/html; charset=ISO-8859-1".$eol;
$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$message .= $body.$eol;
$message .= "--".$uid.$eol;
$message .= "Content-Type: application/pdf; name=\"".$filename."\"".$eol;
$message .= "Content-Transfer-Encoding: base64".$eol;
$message .= "Content-Disposition: attachment; filename=\"".$filename."\"".$eol;
$message .= $content.$eol;
$message .= "--".$uid."--";
 mail($mailto, $subject, $message, $header);

}

require_once('PHPWord.php'); // provide the exact path here.

if(isset($_SESSION['basedocinfo']) && isset($_SESSION['typedocinfo']) && isset($_SESSION['enddocinfo'])){
	$baseinfo = $_SESSION['basedocinfo'];
	$typeinfo = $_SESSION['typedocinfo'];
	$endinfo = $_SESSION['enddocinfo'];


	$word_doc = new PHPWord();

	$section = $word_doc->createSection();


	$word_doc->addFontStyle('titleFont', array('name'=>'Tahoma', 'size'=>13, 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE,'bold'=>true));
	$word_doc->addFontStyle('normalFont', array('name'=>'Tahoma', 'size'=>11));
	$word_doc->addFontStyle('keyFont', array('name'=>'Tahoma', 'size'=>11, 'bold'=>true));


	$section->addText('Algemene gegevens', 'titleFont');
	$basetable = $section->addTable();

	$extrainfo = array('Afstand'=>'meter', 'Hoogte hindernis'=>'cm','Gewicht werpmateriaal'=>'kilo/gram',
		'Springhoogte'=> 'meter', 'Windsnelheid' => 'm/s');

	foreach($baseinfo AS $key => $value){
		// Add row
		$basetable->addRow();
		$basetable->addCell(3500)->addText($key, 'keyFont');
		$basetable->addCell(3500)->addText($value, 'normalFont');
	}

	$section->addTextBreak();

	$section->addText('Clubrecord', 'titleFont');
	$typetable = $section->addTable();
	foreach($typeinfo AS $key => $value){
		// Add row
		$typetable->addRow();
		
			$typetable->addCell(3500)->addText($key, 'keyFont');
			$typetable->addCell(3500)->addText($value, 'normalFont');

			foreach ($extrainfo AS $key1 => $value1){
				if ($key == $key1){
					$typetable->addCell(700)->addText($value1, 'normalFont');
				}
			}

		}

		if(isset($_SESSION['meerkamp'])){
		$meerkamp = $_SESSION['meerkamp'];

		$styleTable = array('borderSize'=>6, 'borderColor'=>'000000', 'cellMargin'=>40);
		$styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'000000', 'bgColor'=>'4FA968');

		// Define cell style arrays
		$styleCell = array('align'=>'center');
		$fontStyleFirstRow = array('bold'=>true, 'align'=>'center');

			// Add table style
		$word_doc->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

		// Add table
		$table = $section->addTable('myOwnTableStyle');

		// Add row
		$table->addRow();

		// Add cells
		$table->addCell(500, $styleCell)->addText('', $fontStyleFirstRow, $styleCell);
		$table->addCell(2100, $styleCell)->addText('Onderdeel', $fontStyleFirstRow);
		$table->addCell(2100, $styleCell)->addText('Prestatie', $fontStyleFirstRow);
		$table->addCell(2100, $styleCell)->addText('Punten', $fontStyleFirstRow);
		$table->addCell(2100, $styleCell)->addText('Gewicht/windmeting', $fontStyleFirstRow);

		// Add more rows / cells
		for($i = 0; $i < 10; $i++){
			if( isset($meerkamp["segment".$i]) && $meerkamp["segment".$i] != "" && !is_null($meerkamp["segment".$i])){
				$table->addRow();
				$table->addCell(500)->addText(($i + 1), $fontStyleFirstRow);
				$table->addCell(2100)->addText($meerkamp["segment".$i]);
				$table->addCell(2100)->addText($meerkamp["performance".$i]);
				$table->addCell(2100)->addText($meerkamp["points".$i]);
				$table->addCell(2100)->addText($meerkamp["misc".$i]);
			}
		}
			$table->addRow();
			$table->addCell(2100, $styleCell)->addText('Totaal aantal punten', $fontStyleFirstRow);
			$table->addCell(2100, $styleCell)->addText($meerkamp["total"]);
	}

	$section->addTextBreak();

	$section->addText('Overige informatie geleverde prestatie', 'titleFont');
	$endtable = $section->addTable();
	foreach($endinfo AS $key => $value){
		// Add row
		$endtable->addRow();
		
			$endtable->addCell(3500)->addText($key, 'keyFont');
			$endtable->addCell(3500)->addText($value, 'normalFont');
		}



	$section->addTextBreak();
	$filename = utf8_decode('Clubrecord '.$baseinfo['Naam']." ".date("d-m-Y").'.docx');
	$doc = PHPWord_IOFactory::createWriter($word_doc, 'Word2007');
	$doc->save($filename);

	$my_filename = "$filename";
	$my_path = "";
	$my_name = "DJA";
	$my_mail = "noreply@dja-zundert.nl";
	$my_replyto = "noreply@dja-zundert.nl";
	$my_subject = "Aanvraag clubrecord DJA";
	$my_message1 = "Beste ".$baseinfo['Naam'].",<br><br>";
	$my_message1 .= "U heeft zojuist op www.dja-zundert.nl een aanvraag gedaan voor een nieuw clubrecord.<br>";
  $my_message1 .= "Bedankt voor uw aanvraag, wij hebben deze ontvangen en in behandeling genomen.<br>";
  $my_message1 .= "Een kopie van uw aanvraag kunt u vinden in de bijlage.<br><br>";
  $my_message1 .= "met vriendelijke groet,<br>";
  $my_message1 .= "Niels Hanegraaf,<br>";
  $my_message1 .= "DJA Zundert";
 	$my_message1 .= "<br><br><br>";
 	$my_message1 .= "LET OP: Dit bericht is verzonden door een geautomatiseerd systeem. Reacties op dit bericht worden niet gelezen of doorgestuurd.";
	$my_message2 = "<br>".$baseinfo['Naam']." heeft zojuist een aanvraag gedaan voor een nieuw clubrecord.<br><br>";
  $my_message2 .= "Deze aanvraag kan je vinden in de bijlage.<br>";
 	$my_message2 .= "<br><br><br>";
 	$my_message2 .= "LET OP: Dit bericht is verzonden door een geautomatiseerd systeem. Reacties op dit bericht worden niet gelezen of doorgestuurd.";

 	//naar aanvrager
	mail_attachment($my_filename, $my_path, $baseinfo['E-mailadres'], $my_mail, $my_name, $my_replyto, $my_subject, $my_message1);
	//naar DJA
	mail_attachment($my_filename, $my_path, $baseinfo['E-mailadres'], $my_mail, $my_name, $my_replyto, $my_subject, $my_message2);

	unlink($filename); // deletes the temporary file
}

?>
			Bedankt voor uw aanvraag. <br>
			Deze is succesvol ingediend en wordt spoedig in behandeling genomen.<br><br>

			<a href="http://www.dja-zundert.nl"><b>Terug naar hoofdpagina</b></a>
</content>
	</article>
</div>

<?php 
session_destroy();
include ('includes/footer.html'); ?>
