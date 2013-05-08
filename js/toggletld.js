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



function selectCheckBox()
{
  var e= document.f1.elements.length;
  var cnt=0;
  var selected=0;
  var value='';
  for(cnt=0;cnt<e;cnt++)
  {
    if(document.f1.elements[cnt].name=="tld[]"   ){
        if(document.f1.elements[cnt].checked){
            var selected=selected+1;
            value=document.f1.elements[cnt].value;
        }
    // alert(document.frm.elements[cnt].value)
    }
  }
  if(selected==1){
      //alert(value);
      value="."+value;
  }
  else if(selected!=0){
      value="Multiple";
  }
  else{
      value="Select";
  }
  
  document.getElementById("selectedtld").innerHTML = value;  
}



function chbg(color,colorid,propertycount) {
   var d=""; 
   propertycount=10;
     document.getElementById(colorid).style.backgroundColor = color; 
      document.getElementById(colorid).style.cursor = 'pointer';
      
     for(var i=1;i<=propertycount;i++){
       d=colorid+"-"+i;
       document.getElementById(d).style.backgroundColor = color;
       document.getElementById(d).style.cursor = 'pointer';
//      document.getElementById(d).onclick =  this.form.submit(); 
       
     }
      


//something.style.cursor = 'pointer';
//something.onclick = function() {
//    // do something...
//}; 
//     
////if(color=="1"){
//     document.querySelectorAll(".class");
//     var nodeList = document.querySelectorAll(".1");
//     for (var i = 0, length = nodeList.length; i < length; i++) {
//     nodeList[i].style.backgroundColor = color; 
////  }
//}
     
    
     
}   