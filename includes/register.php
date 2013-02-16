<?php 

//error_reporting(E_ALL);
//ini_set("display_errors", 1);

 //session_start();
 

if(isset($_POST['name']) and $_POST['name']!=""){
    
    $domain = $_POST['name'];
   
//validate domain
    

    $tld_list = array(
    'arp', 'com', 'edu', 'gov', 'int', 'mil', 'net', 'org',
    'aero', 'biz', 'coop', 'info', 'museum', 'name', 'pro', 'ws',
    'ac', 'ad', 'ae', 'af', 'ag', 'ai', 'al', 'am', 'an', 'ao', 'aq', 'ar', 'as',
    'at', 'au', 'aw', 'az', 'ba', 'bb', 'bd', 'be', 'bf', 'bg', 'bh', 'bi', 'bj',
    'bm', 'bn', 'bo', 'br', 'bs', 'bt', 'bv', 'bw', 'by', 'bz', 'ca', 'cc', 'cd',
    'cf', 'cg', 'ch', 'ci', 'ck', 'cl', 'cm', 'cn', 'co', 'cr', 'cu', 'cv', 'cx',
    'cy', 'cz', 'de', 'dj', 'dk', 'dm', 'do', 'dz', 'ec', 'ee', 'eg', 'eh', 'er',
    'es', 'et', 'fi', 'fj', 'fk', 'fm', 'fo', 'fr', 'ga', 'gd', 'ge', 'gf', 'gg',
    'gh', 'gi', 'gl', 'gm', 'gn', 'gp', 'gq', 'gr', 'gs', 'gt', 'gu', 'gw', 'gy',
    'hk', 'hm', 'hn', 'hr', 'ht', 'hu', 'id', 'ie', 'il', 'im', 'in', 'io', 'iq',
    'ir', 'is', 'it', 'je', 'jm', 'jo', 'jp', 'ke', 'kg', 'kh', 'ki', 'km', 'kn',
    'kp', 'kr', 'kw', 'ky', 'kz', 'la', 'lb', 'lc', 'li', 'lk', 'lr', 'ls', 'lt',
    'lu', 'lv', 'ly', 'ma', 'mc', 'md', 'mg', 'mh', 'mk', 'ml', 'mm', 'mn', 'mo',
    'mp', 'mq', 'mr', 'ms', 'mt', 'mu', 'mv', 'mw', 'mx', 'my', 'mz', 'na', 'nc',
    'ne', 'nf', 'ng', 'ni', 'nl', 'no', 'np', 'nr', 'nu', 'nz', 'om', 'pa', 'pe',
    'pf', 'pg', 'ph', 'pk', 'pl', 'pm', 'pn', 'pr', 'ps', 'pt', 'pw', 'py', 'qa',
    're', 'ro', 'ru', 'rw', 'sa', 'sb', 'sc', 'sd', 'se', 'sg', 'sh', 'si', 'sj',
    'sk', 'sl', 'sm', 'sn', 'so', 'sr', 'st', 'sv', 'sy', 'sz', 'tc', 'td', 'tf',
    'tg', 'th', 'tj', 'tk', 'tm', 'tn', 'to', 'tp', 'tr', 'tt', 'tv', 'tw', 'tz',
    'ua', 'ug', 'uk', 'um', 'us', 'uy', 'uz', 'va', 'vc', 've', 'vg', 'vi', 'vn',
    'vu', 'wf', 'ws', 'ye', 'yt', 'yu', 'za', 'zm', 'zw' );

    $label = '[\\w][\\w\\.\\-]{0,61}[\\w]';
    $tld = '[\\w]+';

    if( preg_match( "/^($label)\\.($tld)$/", $domain, $match ) && in_array( $match[2], $tld_list )) {
   
    
         
        if (FALSE){ // Have to check domain availability
       ?><font color="red"/><?php echo "Domain Available..Please Register"; ?></font><?php
        } 
        else{
            $_SESSION['domain']=$_POST['name'];   
           header( 'Location: index.php?page=2' ) ;  
            }
       
    } else {
       ?><font color="red"/><?php echo "Invalid Domain"; ?></font><?php
        }  
 }
 

 ?>


<div id="content">
  <!---  <h2> <img src="images/lemon-slice.png" /><font color="#9dc33c"> Easy Peasy </font><font color="#61c8d9"> Lemon squeezy!</font></h2>
           <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3 steps away </h3><i>Note: hitting register now will open a new tab, you can make your domain registration request there and be right back.</i>
 
  --->
    
   <table id="Table_01" width="1000" height="173" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2" rowspan="6">
			<img src="images/cloudamaze_psd_01.png" width="11" height="154" alt=""></td>
		<td rowspan="4">
			<img src="images/cloudamaze_psd_02.png" width="234" height="131" alt=""></td>
		<td colspan="5">
			<img src="images/cloudamaze_psd_03.png" width="754" height="37" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="37" alt=""></td>
	</tr>
	<tr>
		<td rowspan="5">
			<img src="images/cloudamaze_psd_04.png" width="19" height="117" alt=""></td>
		<td colspan="3">Easy peasy Lemon squeezy!</td>
		<td rowspan="5">
			<img src="images/cloudamaze_psd_06.png" width="263" height="117" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="38" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/cloudamaze_psd_07.png" width="472" height="34" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="34" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
			<img src="images/cloudamaze_psd_08.png" width="153" height="45" alt=""></td>
		<td rowspan="2">3 Steps away</td>
		<td rowspan="3">
			<img src="images/cloudamaze_psd_10.png" width="154" height="45" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="22" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="images/cloudamaze_psd_11.png" width="234" height="23" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="13" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/cloudamaze_psd_12.png" width="165" height="10" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="10" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/cloudamaze_psd_13.png" width="6" height="18" alt=""></td>
		<td colspan="7">Note: hitting register now will open a new tab, you can make your domain registration request there and be right back.</td>
		<td>
			<img src="images/spacer.gif" width="1" height="18" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="6" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="234" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="19" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="153" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="165" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="154" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="263" height="1" alt=""></td>
		<td></td>
	</tr>
</table> 
    
    
  <div style="width: 45%;height: 45%;margin-bottom:15px;">
    <div id="form-wapper">
            <div id="MainContent">
                <fieldset >
                        <legend>Yey! you have a domain</legend>
                        <form id="MyContactForm" name="MyContactForm" method="post" action="index.php?page=1" onsubmit="validate_domain()">
                          <!---  <label for="name" id="nameLb"></label> --->
                        <input type="text" name="name" id="txt_domain" placeholder="Please drop in your domain name"  size="31"/>
                            <input type="submit" name="submit" value="Submit" style="background-color: #60c8d8 " >
                           
                        </form>
                       
                    </fieldset>
                     
                    
                </div>
              
        </div>
    </div>  
   
 <div id="buttons">
        <div id="skip-domain" class="button">
            <div id="popup" ><a href="#" id="OpenContact"> Continue </a> </div>
            <img src="images/blue-botton.png" class="adjusted"/>
        </div>
       <div id="register-domain" class="button">
            <a href="http://domain.cloudamaze.com/" target="_blank">  Register domain 
            <img src="images/blue-botton.png" class="adjusted"/></a>
        </div>
    </div>
</div>
