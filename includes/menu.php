<div id="menu-bar-container">
  
                    
    <ul id="menu-bar">
     <li <?php if(!isset($page) || (isset($page) && $page==0)){ ?>   class="current" <?php  } ?> ><a href="/home">Home</a></li>
     <li <?php if(isset($page) && $page==1 || (isset($page) && $page==2) ){ ?>   class="current" <?php  } ?>><?php $_SESSION['skip']="false" ?><a href="/register">Domain</a></li>
     <li <?php if((isset($page) && $page==5) || (isset($page) && $page==11) || (isset($page) && $page==13) ){ ?>   class="current"  <?php  } ?> ><a href="/shared-hosting">Hosting</a>
         <ul>
           <li><a href="/shared-hosting">Shared Hosting</a></li>
           <li><a href="/vps">Virtual Private Servers</a></li>
           <li><a href="/dedicated-hosting">Dedicated Hosting</a></li>
         </ul>
     </li>     
     
     <li  <?php if((isset($page) && $page==7) || (isset($page) && $page==8) || (isset($page) && $page==9) || (isset($page) && $page==10) ){ ?>   class="current" style="text-shadow: none;" <?php  } ?> ><a href="/corporate-email">Services</a>
     	<ul>
        	<li><a href="/corporate-email">Corporate Email</a></li>
            <li><a href="/ssl-certificate">SSL Certificate</a></li>
           	<li><a href="/payment-gateway">Payment Gateway</a></li>
           	<li><a href="/server-management">Server Management</a></li>
        </ul>
     </li>
     <li><a href="http://blog.cloudamaze.com/" target="_blank">Blog</a></li>
     <li <?php if(isset($page) && $page==6){ ?>   class="current" <?php  } ?> ><a href="/testimonials">Testimonials</a></li>
     <li <?php if(isset($page) && $page==14){ ?>   class="current" <?php  } ?>><a href="/downloads">Downloads</a></li>
     <li <?php if(isset($page) && $page==15){ ?>   class="current" <?php  } ?> ><a href="/support" >Support</a></li>
     <li <?php if(isset($page) && $page==12){ ?>   class="current" <?php  } ?> ><a href="/contact-us">Contact Us</a></li>
     <li <?php if((isset($page) && $page==17) || (isset($page) && $page==18) || (isset($page) && $page==19) || (isset($page) && $page==20)  ){ ?>   class="current" style="text-shadow: none;" <?php  } ?> ><a href="/about-us">More Info</a>
            <ul>
           <li><a href="/about-us">About Us</a></li>
           <li><a href="/terms">Terms and Conditions </a></li>
           <li><a href="/privacy-policies">Privacy policies</a></li>
           <li><a href="/refund">Refund and Cancellation</a></li>
         </ul>
    
    </ul></li>
</div>
<?php if ( (isset($page) &&  $page==2) || (isset($page) &&  $page==3) || (isset($page) &&  $page==4)  ){ ?>
<div id="tab_bar_wrapper">	
    <div id="tri_div_start"></div>    
        <div id="tab_wrapper">
        	<div <?php if (isset($page) && $page == 1) { ?>id="tri_div_back_active"<?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($page) && $page == 1) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Register</div>
            </div>
        	<div <?php if (isset($page) && $page == 1) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_front" <?php } ?>  ></div>
        </div>
        <div id="tab_wrapper">
        	<div <?php if (isset($page) && $page == 2) { ?> id="tri_div_back_active" <?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($page) && $page == 2) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Select Plan</div>
            </div>
        	<div <?php if (isset($page) && $page == 2) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_front" <?php } ?>  ></div>
        </div>
        <div id="tab_wrapper">
        	<div <?php if (isset($page) && $page == 3) { ?> id="tri_div_back_active" <?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($page) && $page == 3) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Checkout</div>
            </div>
        	<div <?php if (isset($page) && $page == 3) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_front" <?php } ?>  ></div>
        </div>
        <div id="tab_wrapper">
        	<div <?php if (isset($page) && $page == 4) { ?> id="tri_div_back_active" <?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($page) && $page == 4) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Congrats</div>
            </div>        	
        </div> 
        <div <?php if (isset($page) && $page == 4) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_end" <?php } ?>  ></div>   
</div>
<?php } else if(isset($page) &&  $page!=1) { ?>
  <div id="tab_bar_wrapper">	
    <div id="tri_div_start"></div>   
    
     <?php 
                    if(isset($page)){ 
                    if( $page==5 || $page==7 || $page==8 || $page==9 || $page==10 || $page==11 || $page==13){
                        ?>
     <div id="tab_wrapper">
        	<div  id="tri_div_back"   ></div>
            <div  id="tab_item"  >
                <div id="text_wrapper">
                  <?php  
                    switch ($page){
                        case 5: 
                            echo 'Hosting';
                            break;
                        case 7: 
                             echo 'Services';
                            break;
                        case 8: 
                             echo 'Services';
                            break;
                        case 9: 
                             echo 'Services';
                            break;
                        case 10: 
                             echo 'Services';
                            break;
                         case 11: 
                             echo 'Hosting';
                            break;
                        case 13: 
                             echo 'Hosting';
                            break;
                        
                    }
                    ?>
                </div>
            </div>
        	<div  id="tri_div_front"  ></div>
        </div>
    
                    <?php } } ?>
        <div id="tab_wrapper">
        	<div id="tri_div_back_active"  ></div>
            <div  id="tab_item_active"   >
                
             <div id="text_wrapper">
                    <?php 
                    if(isset($page)){
                    switch ($page){
                        case 5: 
                            echo 'Virtual Private Servers';
                            break;
                        case 6: 
                            echo 'Testimonials';
                            break;
                        case 7: 
                             echo 'Corporate Email';
                            break;
                        case 8: 
                             echo 'Payment Gateway';
                            break;
                        case 9: 
                             echo 'Server Management';
                            break;
                        case 10: 
                             echo 'SSL Certificate';
                            break;
                         case 11: 
                             echo 'Dedicated Hosting';
                            break;
                        case 12: 
                             echo 'Contact Us';
                            break;
                        case 13: 
                             echo 'Shared Hosting';
                            break;
                        case 14: 
                             echo 'Downloads';
                            break;
                        case 15: 
                             echo '24/7 Support';
                            break;
                         case 16: 
                             echo 'Domain Registration Price for First Year ';
                            break;
                         case 17: 
                             echo 'About Us';
                            break;
                        case 18: 
                             echo 'Terms and Conditions';
                            break;
                         case 19: 
                             echo ' Privacy Policies';
                            break;
                        case 20: 
                             echo ' Refund and Cancellation Policies';
                            break;
                        case 21: 
                             echo ' Domain Slash Down Price';
                            break;
                        default : echo 'Home';
                            break;
                    }
                    }  else {
                        echo 'Home';
                    }
                    ?>
                    
                    
                </div>
            </div>
        	
        </div>  
    <div  id="tri_div_front_active"  ></div>
    
    
    
    
   </div>
<?php } ?>