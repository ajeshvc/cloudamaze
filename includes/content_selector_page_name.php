<?php if (isset($_GET['page'])) { $page = $_GET['page'];
} else { $page = "home"; }
switch ($page) { 
case "home": $page=0;
break;
case "register":$page=1;
break;
case "hosting": $page=2;
break;
case "checkout": $page=3;
break;
case "congrats": $page=4;
break;
case "vps" : $page=5;
break;
case "testimonials" : $page=6;
break;
case "corporate-email" : $page=7;
break;
case "payment-gateway" : $page=8;
break;
case "server-management" : $page=9;
break;
case "ssl-certificate" : $page=10;
break;
case "dedicated-hosting" : $page=11;
break;
case "contact-us": $page=12;
break;
case "shared-hosting": $page=13;
break;
case "downloads": $page=14;
break;
case "support-ticket": $page=15;
break;
case "domain-pricelist": $page=16;   
            break;
case "about-us": $page=17;   
            
            break;
case "terms": $page=18;   
          
            break;
case "privacy-policies": $page=19;   
           
            break;
case "refund":  $page=20;  
         
            break;
case "domain-slash-down":  $page=21;  
         
            break;
case "badges":  $page=22;  
         
break;
                
default:      
            $page=0;
                 break;

}  ?>