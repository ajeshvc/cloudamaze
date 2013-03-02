<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
//session_start();


if (isset($_POST['name']) and $_POST['name'] != "") {

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
        'vu', 'wf', 'ws', 'ye', 'yt', 'yu', 'za', 'zm', 'zw');

    $label = '[\\w][\\w\\.\\-]{0,61}[\\w]';
    $tld = '[\\w]+';

    if (preg_match("/^($label)\\.($tld)$/", $domain, $match) && in_array($match[2], $tld_list)) {



        if (FALSE) { // Have to check domain availability
            ?><font color="red"/><?php echo "Domain Available..Please Register"; ?></font><?php
        } else {
            $_SESSION['domain'] = $_POST['name'];
            header('Location: index.php?page=2');
        }
    } else {
        ?><font color="red"/><?php echo "Invalid Domain"; ?></font><?php
    }
}
?>

<div id="content">

 <div style="width:100%;height:auto;">
        <div style="float: left;width: 30%">
            <img src="images/lemon-slice.png" /> 
        </div>
        <div style="width:100%;text-align: right;">
            <div style="text-align:center;"><h2><font style="color:#9dc33c;"> Easy Peasy </font><font color="#61c8d9"> Lemon squeezy!</font></h2></div>
            <div style="text-align:center;"><h3> 3 steps away </h3> </div> <div style="text-align:center;"> <i>Note: hitting register now will open a new tab, you can make your domain registration request there and be right back.</i></div>
        </div>
       
    </div>   
  <div style="width: 100%;height: 45%;margin-bottom:15px;margin-left: 0px;">
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
