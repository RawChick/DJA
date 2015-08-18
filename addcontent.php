<?php	

include ('includes/header.html');

?>



<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
						<h2><b>Add Content</b></h2>
					</header>
					
					<content>
						<form action="submit.php" onsubmit="alert('Your submitted HTML was:\n\n' + document.getElementById('noise').value); return false;">
			
				
				<textarea id="noise" name="noise" class="widgEditor"></textarea>
			
				<input type="submit" value="Bekijk voorbeeld" />
			
		</form>

					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>