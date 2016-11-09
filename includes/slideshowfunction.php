<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
// Set slideShowSpeed (milliseconds)
var slideShowSpeed = 5000;
// Duration of crossfade (seconds)
var crossFadeDuration = 1;
// Specify the image files
var Pic = new Array();
// to add more images, just continue
// the pattern, adding to the array below




Pic[0] = 'images/slideshow/dja-2.jpg'
Pic[1] = 'images/slideshow/8.Groepsfoto.jpg'




// do not edit anything below this line
var t;
var j = 0;
var p = Pic.length;
var preLoad = new Array();
for (i = 0; i < p; i++) {
preLoad[i] = new Image();
preLoad[i].src = Pic[i];
}
function runSlideShow() {
if (document.all) {
document.images.SlideShow.style.filter="blendTrans(duration=2)";
document.images.SlideShow.style.filter="blendTrans(duration=crossFadeDuration)";
document.images.SlideShow.filters.blendTrans.Apply();
}
document.images.SlideShow.src = preLoad[j].src;
if (document.all) {
document.images.SlideShow.filters.blendTrans.Play();
}
j = j + 1;
if (j > (p - 1)) j = 0;
t = setTimeout('runSlideShow()', slideShowSpeed);
}
//  End -->
</script>