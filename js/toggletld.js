function eToggle(anctag,darg) 
{
  var ele = document.getElementById(darg);
  var text = document.getElementById(anctag);
  if(ele.style.display == "block") 
  {
    ele.style.display = "none";
	text.innerHTML =  '&#9660';
  }
  else 
  {
	ele.style.display = "block";
	text.innerHTML = "&#9650;";
  }
} 



function moredomainToggle(moretag,domaintxt,content) 
{
  var moretag = document.getElementById(moretag);
  var domaintxt = document.getElementById(domaintxt);
  var content=document.getElementById(content);
  if( domaintxt.style.display == "block") 
  {
    domaintxt.style.display = "none";
//    content.style.display = "block";
    content.style.visibility = "visible";
    
  }
  else 
  {
    domaintxt.style.display = "block";
    content.style.visibility = "hidden";  
//    content.style.height = "1px";
  }
} 