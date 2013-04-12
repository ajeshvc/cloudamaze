<html>
<head>
<script>
function showUser(str)
{
if (str=="")
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getdomainpricelisttest.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>

<form >
<div id=content> loaded page goes here </div>
<a onclick="$('div#content').load('getdomainpricelisttest.php?id=1')">click</a>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

</body>
</html>