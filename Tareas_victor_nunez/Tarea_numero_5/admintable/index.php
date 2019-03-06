<!doctype html>
<html lang=en>
<head>
<title>Index-register</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<!-- <script>
function HoraAjax()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ObtenerHora.php",true);
xmlhttp.send();
}
</script> -->

</head>
<body>
<div id="container">

	<?php include("header.php"); ?>

	<div id="content"><!-- Start of the page-specific content. -->
		<h2>Pagina principal</h2>
		<p>EXAMEN DE PRACTICA <br>
		Programacion avanzada II cuatri 2019 </p>
		<br>
		
		<!-- <div id="myDiv"><h2>Prueba de Ajax</h2></div>
		<button type="button" onclick="HoraAjax()">Contenido</button>
		 -->
			<!-- End of the home content. -->
	</div>
   <span id="liveclock" style="position:absolute;left:0;top:0;"></span>
   <script language="JavaScript" type="text/javascript">
    function show5(){
        if (!document.layers&&!document.all&&!document.getElementById)
        return

         var Digital=new Date()
         var hours=Digital.getHours()
         var minutes=Digital.getMinutes()
         var seconds=Digital.getSeconds()

        var dn="PM"
        if (hours<12)
        dn="AM"
        if (hours>12)
        hours=hours-12
        if (hours==0)
        hours=12

         if (minutes<=9)
         minutes="0"+minutes
         if (seconds<=9)
         seconds="0"+seconds
        //change font size here to your desire
        myclock="<font size='5' face='Arial' ><b><font size='1'>Hora actual:</font></br>"+hours+":"+minutes+":"
         +seconds+" "+dn+"</b></font>"
        if (document.layers){
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
        }
        else if (document.all)
        liveclock.innerHTML=myclock
        else if (document.getElementById)
        document.getElementById("liveclock").innerHTML=myclock
        setTimeout("show5()",1000)
         }


        window.onload=show5
         //-->
     </script>
	 <h6>Fecha actual</h6>
	<?php echo date("Y/m/d"); ?> 
</div>	
<?php include("footer.php"); ?>
</body>
</html>