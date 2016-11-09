
<?php	

include ('includes/header.html');

?>

<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
						<h2><b>Lidmaatschap</b></h2>
					</header>
					
					<content>
						<form action="send_form_email.php" method="POST" enctype="application/x-www-form-urlencoded"  id="inschrijfformulier" name"inschrijfformulier">
      
        <table width="90%" border="1" cellpadding="5" cellspacing="1" class="tabelgroenerand">
          <tr>
            <td width="28%">Achternaam<em>*</em></td>
            <td width="72%"><input name="achternaam" type="text" id="achternaam" size="50" /></td>
          </tr>
          <tr>
            <td>Voorletters<em>*</em></td>
            <td><input name="voorletters" type="text" id="voorletters" size="50" /></td>
          </tr>
          <tr>
            <td height="34">Roepnaam<em>*</em></td>
            <td><input name="roepnaam" type="text" id="roepnaam" size="50" /></td>
          </tr>
          <tr>
            <td height="33">Geslacht</td>
            <td><input type="radio" name="geslacht" value="man" />Man
            <input name="geslacht" type="radio" value="vrouw" />vrouw</td>
          </tr>
          <tr>
            <td>Geboortedatum</td>
            <td>
            
           <select name="gebdag" id="gebdag" style="background-color:#359c6c; font-family:Tahoma, Geneva, sans-serif; font-size:16px; vertical-align:top; color:#FFF">
           <option style="background-color:#1e2f25;">
             <option value="dag" selected="selected">dag</option>
             <?php
            for($i=1; $i < 32; $i++){
              echo " <option value='".$i."'>".$i."</option>";
            }
            ?>
           </select>
            <select name="gebmaand" id="gebmaand" style="background-color:#359c6c; font-family:Tahoma, Geneva, sans-serif; font-size:16px; vertical-align:top; color:#FFF">
              <option value="maand" selected="selected">maand</option>
              <option value="januari">januari</option>
              <option value="februari">februari</option>
              <option value="maart">maart</option>
              <option value="april">april</option>
              <option value="mei">mei</option>
              <option value="juni">juni</option>
              <option value="juli">juli</option>
              <option value="augustus">augustus</option>
              <option value="september">september</option>
              <option value="oktober">oktober</option>
              <option value="november">november</option>
              <option value="december">december</option>
            </select>
            <select name="gebjaar" id="gebjaar" style="background-color:#359c6c; font-family:Tahoma, Geneva, sans-serif; font-size:16px; vertical-align:top; color:#FFF" >
            <option value="jaar" selected="selected">jaar</option>
   <?php
            for($i=2020; $i > 1899; $i--){
              echo " <option value='".$i."'>".$i."</option>";
            }
            ?>

            </select></td>
          </tr>
          <tr>
            <td>Adres<em>*</em></td>
            <td><input name="adres" type="text" id="adres" size="50" /></td>
          </tr>
          <tr>
            <td>Postcode<em>*</em></td>
            <td><input name="postcode" type="text" id="postcode" size="50" /></td>
          </tr>
          <tr>
            <td>Woonplaats<em>*</em></td>
            <td><input name="woonplaats" type="text" id="woonplaats" size="50" /></td>
          </tr>
          <tr>
            <td>Telefoon<em>*</em></td>
            <td><input name="telefoon" type="text" id="telefoon" size="50" /></td>
          </tr>
          <tr>
            <td>E-mail adres<em>*</em></td>
            <td><input name='email' type="text" id='email' size="50" /></td>
          </tr>
          <tr>
            <td>Bankrekeningnummer<em>*</em></td>
            <td><input name="rekeningnummer" type="text" id="rekeningnummer" size="50"/></td>
          </tr>
          <tr>
            <td>Soort lid</td>
            <td><p>
              <label>
                <input type="radio" name="lid" value="senior atleet (met AU-licentie)*" id="Soortlid_0" />
                atleet (met AU-licentie)*</label>
              <br />
              <label>
                <input type="radio" name="lid" value="senior atleet (zonder AU-licentie)*" id="Soortlid_1" />
                atleet (zonder AU-licentie)*</label>
              <br />
              <label>
                <input type="radio" name="lid" value="recreant" id="Soortlid_2" />
                recreant</label>
              <br />
              <label>
                <input type="radio" name="lid" value="wandelsportlid" id="Soortlid_3" />
                wandelsportlid</label>
              <br />
              <label>
                <input type="radio" name="lid" value="jeugdlid" id="Soortlid_4" />
                jeugdlid</label>
              <br />
              <input type="radio" name="lid" value="zomerabonnement" id="Soortlid_5" />
            zomerabonnement</label>
              <p><em>*wil men deelnemen aan AU geregistreerde (baan)wedstrijden elders, dan is een licentie verplicht.<br />
                Jeugdleden hebben automatisch een licentie om aan (jeugd)wedstrijden deel te nemen.</em><br />
            </p></td>
          </tr>
          <tr>
            <td>Ingangsdatum lidmaatschap</td>
            <td><select name="ingangdag" id="ingangdag" style="background-color:#359c6c; font-family:Tahoma, Geneva, sans-serif; font-size:16px; vertical-align:top; color:#FFF">
              <option value="dag" selected="selected">dag</option>
            <?php
            for($i=1; $i < 32; $i++){
              echo " <option value='".$i."'>".$i."</option>";
            }
            ?>

            </select>
              <select name="ingangmaand" id="ingangmaand" style="background-color:#359c6c; font-family:Tahoma, Geneva, sans-serif; font-size:16px; vertical-align:top; color:#FFF">
                <option value="maand" selected="selected">maand</option>
                <option value="januari">januari</option>
                <option value="februari">februari</option>
                <option value="maart">maart</option>
                <option value="april">april</option>
                <option value="mei">mei</option>
                <option value="juni">juni</option>
                <option value="juli">juli</option>
                <option value="augustus">augustus</option>
                <option value="september">september</option>
                <option value="oktober">oktober</option>
                <option value="november">november</option>
                <option value="december">december</option>
            </select>
              <select name="ingangjaar" id="ingangjaar" style="background-color:#359c6c; font-family:Tahoma, Geneva, sans-serif; font-size:16px; vertical-align:top; color:#FFF">
                <option value="jaar" selected="selected">jaar</option>

  <?php
            for($i=2015; $i < 2050; $i++){
              echo " <option value='".$i."'>".$i."</option>";
            }
            ?>
            </select></td>
          </tr>
          <tr>
            <td>EHBO begeleiding</td>
            <td><input type="radio" name="EHBO" value="nee" checked="checked" />
            nee, ik heb geen EHBO diploma<br />
            <input type="radio" name="EHBO" value="ja" />
            ja, ik ben in het bezit van een EHBO diploma en ben bereid bij DJA, bij wedstrijden en/of andere evenementen, als zodanig op te treden.</td>
          </tr>
          <tr>
            <td>Automatische incasso<em>*</em></td>
            <td><label>
<input type="checkbox" name="incasso" checked="checked" disabled readonly>
            </label>
              Hierbij geef ik toestemming om de <a href="contributie.php" target="_blank">contributie</a> automatisch te incasseren.<br />
              Ter bevestiging zal ik het <a href="pdf/machtigingsformulier.pdf" target="_blank">machtigingsformulier downloaden</a>, invullen, ondertekenen en afgeven bij mijn trainer of bij de ledenadministratie, Erik Klein, Akkermolenweg 15, 4882 BL  Zundert </td>
          </tr>
          <tr>
            <td>Huishoudelijk reglement 2014</td>
            <td><input type="checkbox" name="reglement" checked="checked" disabled readonly>Hierbij verklaar ik dat ik akkoord ga met het <a href="pdf/huishoudelijk reglement 2014.pdf" target="_blank">huishoudelijk reglement</a></td>
          </tr>
          <tr>
            <td>Statuten 1997</td>
            <td><input type="checkbox" name="statuten" checked="checked" disabled readonly>Hierbij verklaar ik dat ik akkoord ga met de <a href="pdf/Statuten DJA_1997.pdf" target="_blank">statuten</a></td>
          </tr>
          <tr>
            <td>Protocol Social Media DJA</td>
            <td><input type="checkbox" name="socialmedia" checked="checked" disabled readonly>              
              Hierbij verklaar ik dat ik akkoord ga met het <a href="pdf/Richtlijnen gebruik social media DJA.pdf" target="_blank">protocol Social Media DJA</a></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="inschrijven">
              <em>*</em> Verplicht invullen</td>
          </tr>
        </table>
      </form>
    

					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>