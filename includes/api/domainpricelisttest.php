<html>
<head>
<script>
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
        if(id==1){
    document.getElementById("content1").innerHTML=xmlhttp.responseText;
        }
        if(id==2){
    document.getElementById("content2").innerHTML=xmlhttp.responseText;
        }
    }
  }
xmlhttp.open("GET","getdomainpricelisttest.php?id="+id,true);
xmlhttp.send();
}
</script>
</head>
<body onload="showdomainprice(1)">

<form >

<a onclick="showdomainprice(1)">More</a>
<input type="text" onkeyup="showdomainprice(1)">
<div id=content1> loaded page goes here </div>
<a onclick="showdomainprice(2)">More</a>
<input type="text" onkeyup="showdomainprice(2)">
<div id=content2> loaded page goes here </div>
</form>
<br>


</body>
</html>