<script src="pics/getimages.php"></script>
 
<script type="text/javascript">
 
var curimg=0
function rotateimages(){
    document.getElementById("slideshow").setAttribute("src", "pics/"+galleryarray[curimg])
    curimg=(curimg<galleryarray.length-1)? curimg+1 : 0
}
 
window.onload=function(){
    setInterval("rotateimages()", 2500)
}
</script>
 
<div style="width: 170px; height: 160px">
<img id="slideshow" src="images/slideshow/mario_galaxy_800x600.jpg" />
</div>