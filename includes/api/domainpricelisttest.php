<html>
<head>
<script>
    var id=0;
setInterval("showdomainprice(id++)",100);    
function showdomainprice(id)
{
if (id=='')
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
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
       
    document.getElementById("content").innerHTML+=xmlhttp.responseText;
       
    }
  }
xmlhttp.open("GET","getdomainpricelisttest.php?id="+id,true);
xmlhttp.send();
}
</script>
</head>
<body onload="showdomainprice(0)">

<form >

    
<div id=content>  </div>

</form>
<br>


</body>
</html>