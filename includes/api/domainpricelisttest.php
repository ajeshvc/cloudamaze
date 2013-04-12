<html>
<head>
<script>
//   var id=0; 
//  var int=self.setInterval(function(){
//        id++;
//        showdomainprice(id);
//      
//    
//    },1000); 
    function repeat(){
        var id=0;
        setInterval(function(){
  // Call to your function that performs an ajax call...
 showdomainprice(id++) 
}, 5000);
    }
function showdomainprice(id)
{

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
<body onload="repeat()">

<form >

    
<div id=content>  </div>

</form>

</body>
</html>



<!--<button onclick="int=window.clearInterval(int)">Stop</button>-->