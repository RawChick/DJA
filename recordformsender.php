<?php include ('includes/header.html'); 
session_start(); ?>

<div class= "bottomcontent">
<article class="mainbar">	
<header>
<h2><b>Clubrecord ingediend</b></h2>
</header><br>
<content>

<?php

require_once('PHPWord.php');
require('PHPMailer/PHPMailerAutoload.php');

function mail_message($noreply_mail, $senders_mail, $senders_name, $subject, $message, $filelocation, $senders_boolean){
//Create a new PHPMailer instance
	$mail = new PHPMailer;
	// Set PHPMailer to use the sendmail transport
	$mail->isSendmail();
	//Set who the message is to be sent from
	$mail->setFrom($noreply_mail, 'DJA Zundert');
	//Set an alternative reply-to address
	$mail->addReplyTo($noreply_mail, 'DJA Zundert');
	//Set who the message is to be sent to
	$mail->addAddress($senders_mail, $senders_name);
	//Set the subject line
	$mail->Subject = $subject;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML($message);
	//Replace the plain text body with one created manually
	// $mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	$mail->addAttachment($filelocation);

	//send the message, check for errors
	if (!$mail->send()) {
		if($senders_boolean == 1){
			echo "Er is helaas iets misgegaan, probeer het alstublieft opnieuw.<br><br>";
			echo "<b><a href='recordform.php'>Ga terug naar formulier</a></b><br><br>";
			// echo "Mailer Error: " . $mail->ErrorInfo;		
		}	
	} else {
		if($senders_boolean == 1) {
			echo "Bedankt voor uw aanvraag. <br>
			Deze is succesvol ingediend en wordt spoedig in behandeling genomen.<br><br>
			Klik <a href='".utf8_decode($filelocation)."'><b>hier</b></a>
			om een kopie van uw aanvraag te downloaden.<br><br>"; 
		}
	}
}

if(isset($_SESSION['basedocinfo']) && isset($_SESSION['typedocinfo']) && isset($_SESSION['enddocinfo'])){
	$baseinfo = $_SESSION['basedocinfo'];
	$typeinfo = $_SESSION['typedocinfo'];
	$endinfo = $_SESSION['enddocinfo'];

	$word_doc = new PHPWord();

	$sectionStyle = array('marginTop' => 600);
	$section = $word_doc->createSection($sectionStyle);
	$section->addImage("images/Logo.jpg",array('width'=>90, 'height'=>82, 'align'=>'left'));

	$word_doc->addFontStyle('titleFont', array('name'=>'Tahoma', 'size'=>13, 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE,'bold'=>true));
	$word_doc->addFontStyle('normalFont', array('name'=>'Tahoma', 'size'=>11));
	$word_doc->addFontStyle('keyFont', array('name'=>'Tahoma', 'size'=>11, 'bold'=>true));
	$word_doc->addFontStyle('smallFont', array('name'=>'Tahoma', 'size'=>9, 'bold'=>true));

	$section->addText('Algemene gegevens', 'titleFont');
	$basetable = $section->addTable();

	$extrainfo = array('Afstand'=>'meter', 'Hoogte hindernis'=>'cm','Gewicht werpmateriaal'=>'kilo',
	'Springhoogte'=> 'meter', 'Windsnelheid' => 'm/s', 'Gelopen tijd (bruto)' => 'mm:ss', 'Gelopen tijd (netto)' => 'mm:ss');

	foreach($baseinfo AS $key => $value){
		// Add row
		$basetable->addRow();
		$basetable->addCell(3500)->addText($key, 'keyFont');
		$basetable->addCell(3500)->addText($value, 'normalFont');
	}

	$section->addTextBreak();

	$section->addText('Clubrecord', 'titleFont');
	$typetable = $section->addTable();
	if($typeinfo['Ondergrond'] == 'Baan' && $typeinfo['Type onderdeel'] == 'Werpen'){
		if($typeinfo['Werp onderdeel'] == 'Speerwerpen'){
			$speerweight = 'gram';
		}
	}

	foreach($typeinfo AS $key => $value){
		// Add row
		$typetable->addRow();

		if(isset($extrainfo[$key])){
			$typetable->addCell(3500)->addText($key, 'keyFont');
			if(isset($speerweight) && $key == 'Gewicht werpmateriaal'){
				$typetable->addCell(350)->addText($value." gram", 'normalFont');
			} else {
				$typetable->addCell(350)->addText($value." ".$extrainfo[$key], 'normalFont');
			}
		} else {
			$typetable->addCell(3500)->addText($key, 'keyFont');
			$typetable->addCell(3500)->addText($value, 'normalFont');
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
		$table->addCell(2100, $styleCell)->addText('Overige informatie', $fontStyleFirstRow);

		$total = 0;
		// Add more rows / cells
		for($i = 0; $i < 10; $i++){
			if( isset($meerkamp["segment".$i]) && $meerkamp["segment".$i] != "" && !is_null($meerkamp["segment".$i])){
				$table->addRow();
				$table->addCell(500)->addText(($i + 1), $fontStyleFirstRow);
				$table->addCell(2100)->addText($meerkamp["segment".$i]);
				$table->addCell(2100)->addText($meerkamp["performance".$i]);
				$table->addCell(2100)->addText($meerkamp["points".$i]);
				$table->addCell(2100)->addText($meerkamp["misc".$i]);
				$total = $total + $meerkamp["points".$i];
			}
		}

		$typetable->addRow();
		$typetable->addCell(3500)->addText('Totaal aantal punten', 'keyFont');
		$typetable->addCell(3500)->addText($total, 'normalFont');
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

	$section->addPageBreak();
	$section->addText('Hieronder niets meer invullen', 'smallFont');
	$section->addText('________________________________________________________________', 'keyFont');
	$section->addTextBreak();
	$section->addText('CONCLUSIE VAN DE RECORDCOMMISSIE: officieel / officieus', 'keyFont');
	$section->addText('Het aanvraagformulier is tijdig ontvangen op '.date("d-m-Y", strtotime("now")), 'keyFont');
	$section->addText('De aanvraag is akkoord bevonden / afgewezen om de volgende reden:', 'keyFont');
	$section->addText('.................................................................................................................', 'normalFont');
	$section->addText('.................................................................................................................', 'normalFont'); 
	$section->addText('.................................................................................................................', 'normalFont');
	$section->addText('.................................................................................................................', 'normalFont');
	$filename = utf8_decode('Clubrecord aanvraag '.date("d-m-y_His").'.docx');
	$doc = PHPWord_IOFactory::createWriter($word_doc, 'Word2007');
	$doc->save(utf8_decode('records/'.$filename));

	$my_path = "records/".$filename;
	$my_replyto = "noreply@dja-zundert.nl";
	$my_subject = "Aanvraag clubrecord DJA";
	$senders_mail = $baseinfo['E-mailadres'];
	$senders_name = $baseinfo['Naam'];
	$dja_mail = 'dja.clubrecords@gmail.com';

	$my_message1 = "Beste ".$senders_name.",<br><br>";
	$my_message1 .= "U heeft zojuist op www.dja-zundert.nl een aanvraag gedaan voor een nieuw clubrecord.<br>";
	$my_message1 .= "Bedankt voor uw aanvraag, wij hebben deze ontvangen en in behandeling genomen.<br>";
	$my_message1 .= "Een kopie van uw aanvraag kunt u vinden in de bijlage.<br><br>";
	$my_message1 .= "met vriendelijke groet,<br>";
	$my_message1 .= "DJA Zundert";
	$my_message1 .= "<br>";
	$my_message1 .= "LET OP: Dit bericht is verzonden door een geautomatiseerd systeem. Reacties op dit bericht worden niet gelezen of doorgestuurd.";

	$my_message2 = "Beste,<br><br>";
	$my_message2 .= $senders_name." heeft zojuist een aanvraag gedaan voor een nieuw clubrecord.<br>";
	$my_message2 .= "Deze aanvraag kan je vinden in de bijlage.<br>";
	$my_message2 .= "<br><br><br>";
	$my_message2 .= "LET OP: Dit bericht is verzonden door een geautomatiseerd systeem. Reacties op dit bericht worden niet gelezen of doorgestuurd.";

	//naar aanvrager
	mail_message($my_replyto, $senders_mail, $senders_name, $my_subject, $my_message1, $my_path, 1);
		
	//naar DJA 
	// $senders_mail vervangen met $dja_mail
	mail_message($my_replyto, $senders_mail, $senders_name, $my_subject, $my_message2, $my_path, 0);

} else {
	echo "Oei, er gaat iets fout...<br><br>";
}
?>
<a href="http://www.dja-zundert.nl"><b>Terug naar hoofdpagina</b></a>
</content>
</article>
</div>

<?php 
session_destroy();
include ('includes/footer.html'); ?>
