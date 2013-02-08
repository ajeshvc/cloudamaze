<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cloudamaze.com | get amazed!</title>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
      
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/lightboxstyle.css" media="screen" />
    
   	    <script type="text/javascript">
                       
$(document).ready(function() {
$('.error').hide(); //Hide error messages
$('#MainResult').hide(); //we will hide this right now
$('#form-wapper').hide(); //hiden main form
$("button").click(function() { //User clicks on Submit button

// Fetch data from input fields.
var js_name = $("#name").val();


// Do a simple validation
if(js_name==""){
    $("#nameLb .error").show(); // If Field is empty, we'll just show error text inside <span> tag.
return false;}

return true;
});

//If user wants to send another mail, send him back to form.
$("#gobacknow").live("click", function() {
$("#MainResult").hide(); //show Result
$("#MainContent").slideDown("slow"); //hide form div slowly

//clear all fields to empty state
$("#name").val('');
});

$("#OpenContact").live("click", function() {
$("#form-wapper").toggle("slow");

});
});




function checkDomain()
{
var nname=doucument.getElementById("txt_domain")
var arr = new Array(
'.com','.net','.org','.biz','.coop','.info','.museum','.name',
'.pro','.edu','.gov','.int','.mil','.ac','.ad','.ae','.af','.ag',
'.ai','.al','.am','.an','.ao','.aq','.ar','.as','.at','.au','.aw',
'.az','.ba','.bb','.bd','.be','.bf','.bg','.bh','.bi','.bj','.bm',
'.bn','.bo','.br','.bs','.bt','.bv','.bw','.by','.bz','.ca','.cc',
'.cd','.cf','.cg','.ch','.ci','.ck','.cl','.cm','.cn','.co','.cr',
'.cu','.cv','.cx','.cy','.cz','.de','.dj','.dk','.dm','.do','.dz',
'.ec','.ee','.eg','.eh','.er','.es','.et','.fi','.fj','.fk','.fm',
'.fo','.fr','.ga','.gd','.ge','.gf','.gg','.gh','.gi','.gl','.gm',
'.gn','.gp','.gq','.gr','.gs','.gt','.gu','.gv','.gy','.hk','.hm',
'.hn','.hr','.ht','.hu','.id','.ie','.il','.im','.in','.io','.iq',
'.ir','.is','.it','.je','.jm','.jo','.jp','.ke','.kg','.kh','.ki',
'.km','.kn','.kp','.kr','.kw','.ky','.kz','.la','.lb','.lc','.li',
'.lk','.lr','.ls','.lt','.lu','.lv','.ly','.ma','.mc','.md','.mg',
'.mh','.mk','.ml','.mm','.mn','.mo','.mp','.mq','.mr','.ms','.mt',
'.mu','.mv','.mw','.mx','.my','.mz','.na','.nc','.ne','.nf','.ng',
'.ni','.nl','.no','.np','.nr','.nu','.nz','.om','.pa','.pe','.pf',
'.pg','.ph','.pk','.pl','.pm','.pn','.pr','.ps','.pt','.pw','.py',
'.qa','.re','.ro','.rw','.ru','.sa','.sb','.sc','.sd','.se','.sg',
'.sh','.si','.sj','.sk','.sl','.sm','.sn','.so','.sr','.st','.sv',
'.sy','.sz','.tc','.td','.tf','.tg','.th','.tj','.tk','.tm','.tn',
'.to','.tp','.tr','.tt','.tv','.tw','.tz','.ua','.ug','.uk','.um',
'.us','.uy','.uz','.va','.vc','.ve','.vg','.vi','.vn','.vu','.ws',
'.wf','.ye','.yt','.yu','.za','.zm','.zw');

var mai = nname;
var val = true;

var dot = mai.lastIndexOf(".");
var dname = mai.substring(0,dot);
var ext = mai.substring(dot,mai.length);
//alert(ext);
	
if(dot>2 && dot<57)
{
	for(var i=0; i<arr.length; i++)
	{
	  if(ext == arr[i])
	  {
	 	val = true;
		break;
	  }	
	  else
	  {
	 	val = false;
	  }
	}
	if(val == false)
	{
	  	 alert("Your domain extension "+ext+" is not correct");
		 return false;
	}
	else
	{
		for(var j=0; j<dname.length; j++)
		{
		  var dh = dname.charAt(j);
		  var hh = dh.charCodeAt(0);
		  if((hh > 47 && hh<59) || (hh > 64 && hh<91) || (hh > 96 && hh<123) || hh==45 || hh==46)
		  {
			 if((j==0 || j==dname.length-1) && hh == 45)	
		  	 {
		 	  	 alert("Domain name should not begin are end with '-'");
			      return false;
		 	 }
		  }
		else	{
		  	 alert("Your domain name should not have special characters");
			 return false;
		  }
		}
	}
}
else
{
 alert("Your Domain name is too short/long");
 return false;
}	

return true;
}

</script>


    
    </head>
    <body>
        <div id="container">
            <?php include 'includes/header.php'; ?>
            <div id="outer-content">
                <?php include 'includes/menu.php'; ?>
                <div id="inner-content">
                    <?php include 'includes/content_selecter.php'; ?>
                </div>
            </div>
            <?php include 'includes/footer.php'; ?>
            <img src="images/side-bar.png" id="side-bar"/>
        </div>
    </body>
</html>
