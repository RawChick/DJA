<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is niet ingevuld.\n'; }
    } if (errors) alert('De volgende velden zijn niet ingevuld:\n'+errors);
	if(form.incasso.checked==false)naw=naw+"Geeft u toestemming voor automatische incasso, vink dit dan aan. ";
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
<?php	

include ('includes/header.html');

?>

<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
						<h2><b>Lidmaatschap</b></h2>
					</header>
					
					<content>
						<form action="" method="post" enctype="text/plain"  id="inschrijfformulier">
      
        <table width="90%" border="1" cellpadding="5" cellspacing="1" class="tabelgroenerand">
          <tr>
            <td width="28%">Achternaam*</td>
            <td width="72%"><input name="achternaam" type="text" id="achternaam" size="50" /></td>
          </tr>
          <tr>
            <td>Voorletters*</td>
            <td><input name="voorletters" type="text" id="voorletters" size="20" /></td>
          </tr>
          <tr>
            <td height="34">Roepnaam*</td>
            <td><input name="roepnaam" type="text" id="roepnaam" size="50" /></td>
          </tr>
          <tr>
            <td height="33">Geslacht</td>
            <td><input type="radio" name="geslacht" value="man" checked="checked"/>Man
            <input name="geslacht" type="radio" value="vrouw" />vrouw</td>
          </tr>
          <tr>
            <td>Geboortedatum</td>
            <td>
            
           <select name="gebdag" id="gebdag" style="background-color:#359c6c; font-family:Tahoma, Geneva, sans-serif; font-size:16px; vertical-align:top; color:#FFF">
           <option style="background-color:#1e2f25;">
             <option value="dag" selected="selected">dag</option>
             <option value="1">1</option>           
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
             <option value="6">6</option>
             <option value="7">7</option>
             <option value="8">8</option>
             <option value="9">9</option>
             <option value="10">10</option>
             <option value="11">11</option>
             <option value="12">12</option>
             <option value="13">13</option>
             <option value="14">14</option>
             <option value="15">15</option>
             <option value="16">16</option>
             <option value="17">17</option>
             <option value="18">18</option>
             <option value="19">19</option>
             <option value="20">20</option>
             <option value="21">21</option>
             <option value="22">22</option>
             <option value="23">23</option>
             <option value="24">24</option>
             <option value="25">25</option>
             <option value="26">26</option>
             <option value="27">27</option>
             <option value="28">28</option>
             <option value="29">29</option>
             <option value="30">30</option>
             <option value="31">31</option>
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
              <option value="2010">2010</option>
              <option value="2009">2009</option>
              <option value="2008">2008</option>
              <option value="2007">2007</option>
              <option value="2006">2006</option>
              <option value="2005">2005</option>
              <option value="2004">2004</option>
              <option value="2003">2003</option>
              <option value="2002">2002</option>
              <option value="2001">2001</option>
              <option value="2000">2000</option>
              <option value="1999">1999</option>
              <option value="1998">1998</option>
              <option value="1997">1997</option>
              <option value="1996">1996</option>
              <option value="1995">1995</option>
              <option value="1994">1994</option>
              <option value="1993">1993</option>
              <option value="1992">1992</option>
              <option value="1991">1991</option>
              <option value="1990">1990</option>
              <option value="1989">1989</option>
              <option value="1988">1988</option>
              <option value="1987">1987</option>
              <option value="1986">1986</option>
              <option value="1985">1985</option>
              <option value="1984">1984</option>
              <option value="1983">1983</option>
              <option value="1982">1982</option>
              <option value="1981">1981</option>
              <option value="1980">1980</option>
              <option value="1979">1979</option>
              <option value="1978">1978</option>
              <option value="1977">1977</option>
              <option value="1976">1976</option>
              <option value="1975">1975</option>
              <option value="1974">1974</option>
              <option value="1973">1973</option>
              <option value="1972">1972</option>
              <option value="1971">1971</option>
              <option value="1970">1970</option>
              <option value="1969">1969</option>
              <option value="1968">1968</option>
              <option value="1967">1967</option>
              <option value="1966">1966</option>
              <option value="1965">1965</option>
              <option value="1964">1964</option>
              <option value="1963">1963</option>
              <option value="1962">1962</option>
              <option value="1961">1961</option>
              <option value="1960">1960</option>
              <option value="1959">1959</option>
              <option value="1958">1958</option>
              <option value="1957">1957</option>
              <option value="1956">1956</option>
              <option value="1955">1955</option>
              <option value="1954">1954</option>
              <option value="1953">1953</option>
              <option value="1952">1952</option>
              <option value="1951">1951</option>
              <option value="1950">1950</option>
              <option value="1949">1949</option>
              <option value="1948">1948</option>
              <option value="1947">1947</option>
              <option value="1946">1946</option>
              <option value="1945">1945</option>
              <option value="1944">1944</option>
              <option value="1943">1943</option>
              <option value="1942">1942</option>
              <option value="1941">1941</option>
              <option value="1940">1940</option>
              <option value="1939">1939</option>
              <option value="1938">1938</option>
              <option value="1937">1937</option>
              <option value="1936">1936</option>
              <option value="1935">1935</option>
              <option value="1934">1934</option>
              <option value="1933">1933</option>
              <option value="1932">1932</option>
            </select></td>
          </tr>
          <tr>
            <td>Adres*</td>
            <td><input name="adres" type="text" id="adres" size="50" /></td>
          </tr>
          <tr>
            <td>Postcode*</td>
            <td><input name="postcode" type="text" id="postcode" size="20" /></td>
          </tr>
          <tr>
            <td>Woonplaats*</td>
            <td><input name="woonplaats" type="text" id="woonplaats" size="50" /></td>
          </tr>
          <tr>
            <td>Telefoon*</td>
            <td><input name="telefoon" type="text" id="telefoon" size="50" /></td>
          </tr>
          <tr>
            <td>E-mail adres*</td>
            <td><input name="emailadres" type="text" id="emailadres" size="50" /></td>
          </tr>
          <tr>
            <td>Bankrekeningnummer*</td>
            <td><input name="rekeningnummer" type="text" id="rekeningnummer" size="50"/></td>
          </tr>
          <tr>
            <td>Soort lid</td>
            <td><p>
              <label>
                <input type="radio" name="Soort lid" value="senior atleet (met AU-licentie)*" id="Soortlid_0" />
                atleet (met AU-licentie)*</label>
              <br />
              <label>
                <input type="radio" name="Soort lid" value="senior atleet (zonder AU-licentie)*" id="Soortlid_1" />
                atleet (zonder AU-licentie)*</label>
              <br />
              <label>
                <input type="radio" name="Soort lid" value="recreant" id="Soortlid_2" />
                recreant</label>
              <br />
              <label>
                <input type="radio" name="Soort lid" value="wandelsportlid" id="Soortlid_3" />
                wandelsportlid</label>
              <br />
              <label>
                <input type="radio" name="Soort lid" value="jeugdlid" id="Soortlid_4" />
                jeugdlid</label>
              <br />
              <input type="radio" name="Soort lid" value="zomerabonnement" id="Soortlid_5" />
            zomerabonnement</label> (lees <a href="homepage/Uitnodiging zomerstop 2014.pdf">hier</a> voor meer informatie)</p>
              <p><em>*wil men deelnemen aan AU geregistreerde (baan)wedstrijden elders, dan is een licentie verplicht.<br />
                Jeugdleden hebben automatisch een licentie om aan (jeugd)wedstrijden deel te nemen.</em><br />
            </p></td>
          </tr>
          <tr>
            <td>Ingangsdatum lidmaatschap</td>
            <td><select name="ingangdag" id="ingangdag" style="background-color:#359c6c; font-family:Tahoma, Geneva, sans-serif; font-size:16px; vertical-align:top; color:#FFF">
              <option value="dag" selected="selected">dag</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="19">18</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
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
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
            </select></td>
          </tr>
          <tr>
            <td>Automatische incasso*</td>
            <td><label>
<input type="checkbox" name="incasso" value="incasso" checked="checked">
            </label>
              Hierbij geef ik toestemming om de <a href="contributie.php">contributie</a> automatisch te incasseren.<br />
              Ter bevestiging zal ik het <a href="pdf/machtigingsformulier.pdf">machtigingsformulier downloaden</a>, invullen, ondertekenen en afgeven bij mijn trainer of bij de ledenadministratie, Erik Klein, Akkermolenweg 15, 4882 BL  Zundert </td>
          </tr>
          <tr>
            <td>EHBO begeleiding</td>
            <td><input type="radio" name="EHBO" value="nee" checked="checked" />
            nee, ik heb geen EHBO diploma<br />
            <input type="radio" name="EHBO" value="ja" />
            ja, ik ben in het bezit van een EHBO diploma en ben bereid bij DJA, bij wedstrijden en/of andere evenementen, als zodanig op te treden.</td>
          </tr>
          <tr>
            <td>Huishoudelijk reglement 2014</td>
            <td><input type="checkbox" name="reglement" value="reglement" checked="checked">Hierbij verklaar ik dat ik akkoord ga met het <a href="pdf/huishoudelijk reglement 2014.pdf">huishoudelijk reglement</a></td>
          </tr>
          <tr>
            <td>Statuten 1997</td>
            <td><input type="checkbox" name="statuten" value="statuten" checked="checked">Hierbij verklaar ik dat ik akkoord ga met de <a href="pdf/Statuten DJA_1997.pdf">statuten</a></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="inschrijven" onclick="MM_validateForm('achternaam','','R','voorletters','','R','roepnaam','','R','adres','','R','postcode','','R','woonplaats','','R','telefoon','','R','rekeningnummer','','R');return document.MM_returnValue" value="Verstuur formulier">
              * Verplicht invullen</td>
          </tr>
        </table>
      </form>
    

					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>