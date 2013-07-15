function getleftposition(elementid) {
    var picpos = document.getElementById(elementid);
    var l = picpos.offsetLeft;
    while (picpos = picpos.offsetParent)
        l += picpos.offsetLeft;
    return l;
}
function gettopposition(elementid) {
    var picpos = document.getElementById(elementid);
    var t = picpos.offsetTop;
    while (picpos = picpos.offsetParent)
        t += picpos.offsetTop;
    return t;
}

function issameposition(l,t,divid){
     var flag=false;
     var code = document.getElementById(divid);
     if (code.style.display == "block")
   {
    var p = getleftposition(divid);
    var q = gettopposition(divid);
    if(p==l-12 && q-10==t+200){
    flag=true;
    }
   }
return flag;
}
function eTogglebadges(divid, parameter, picid)
{
    var code = document.getElementById(divid);
    var textcode = document.getElementById("textcode");
    // get position 
    var l = getleftposition(picid);
    var t = gettopposition(picid);
   
    // enable/disable div
    //alert(issameposition(l,t,divid));
    if (issameposition(l,t,divid))
    {
      code.style.display = "none";
    }else
    {
        code.style.display = "block";
        textcode.innerHTML = "&#60;a href='http://cloudamaze.com'>&#60;img src='http://cloudamaze.com/images/badge/" + parameter + "' alt='cloudamaze.com' width='42' height='42'/>&#60;/a>";
        // set position
        t += -10;
        l += -300;
        l = l.toString();
        t = t.toString();
        l += "px";
        t += "px";
        code.style.position = "absolute";
        code.style.left = l;
        code.style.top = t;
    }
 
}

