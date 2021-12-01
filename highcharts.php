<script type="text/javascript" src="http://canvg.github.io/canvg/rgbcolor.js"></script> 
<script type="text/javascript" src="http://canvg.github.io/canvg/StackBlur.js"></script>
<script type="text/javascript" src="http://canvg.github.io/canvg/canvg.js"></script> 
 
<!-- Hightchart Js -->
<script src="http://code.highcharts.com/highcharts.js"></script>
 
<!-- Highchart container -->
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
 
<!-- canvas tag to convert SVG -->
<canvas id="canvas" style="display:none;"></canvas>
 
<!-- Save chart as image on the server -->
<input type="button" id="save_img" value="saveImage"/>
 <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript">
$(function () {
$('#container').highcharts({

});
 
$("#save_img").click(function(){
var svg = document.getElementById('container').children[0].innerHTML;
canvg(document.getElementById('canvas'),svg);
var img = canvas.toDataURL("image/png"); //img is data:image/png;base64
img = img.replace('data:image/png;base64,', '');
var data = "bin_data=" + img;
$.ajax({
type: "POST",
url: savecharts.php,
data: data,
success: function(data){
alert(data);
}
});
});
}); 
 
</script>