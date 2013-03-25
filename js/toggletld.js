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