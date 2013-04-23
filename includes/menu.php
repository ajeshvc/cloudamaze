<div id="menu-bar-container">
  
                    
    <ul id="menu-bar">
     <li <?php if(!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page']==0)){ ?>   class="current" <?php  } ?> ><a href="index.php">Home</a></li>
     <li <?php if(isset($_GET['page']) && $_GET['page']==1 || (isset($_GET['page']) && $_GET['page']==2) ){ ?>   class="current" <?php  } ?>><a href="index.php?page=1&skip=false">Domain</a></li>
     <li <?php if((isset($_GET['page']) && $_GET['page']==5) || (isset($_GET['page']) && $_GET['page']==11) || (isset($_GET['page']) && $_GET['page']==13) ){ ?>   class="current"  <?php  } ?> ><a href="index.php?page=13">Hosting</a>
         <ul>
           <li><a href="index.php?page=13">Shared Hosting</a></li>
           <li><a href="index.php?page=5">Virtual Private Servers</a></li>
           <li><a href="index.php?page=11">Dedicated Hosting</a></li>
         </ul>
     </li>     
     
     <li  <?php if((isset($_GET['page']) && $_GET['page']==7) || (isset($_GET['page']) && $_GET['page']==8) || (isset($_GET['page']) && $_GET['page']==9) || (isset($_GET['page']) && $_GET['page']==10) ){ ?>   class="current" style="text-shadow: none;" <?php  } ?> ><a href="index.php?page=7">Services</a>
     	<ul>
        	<li><a href="index.php?page=7">Corporate Email</a></li>
            <li><a href="index.php?page=10">SSL Certificate</a></li>
           	<li><a href="index.php?page=8">Payment Gateway</a></li>
           	<li><a href="index.php?page=9">Server Management</a></li>
        </ul>
     </li>
     <li><a href="http://blog.cloudamaze.com/" target="_blank">Blog</a></li>
     <li <?php if(isset($_GET['page']) && $_GET['page']==6){ ?>   class="current" <?php  } ?> ><a href="index.php?page=6">Testimonials</a></li>
     <li <?php if(isset($_GET['page']) && $_GET['page']==14){ ?>   class="current" <?php  } ?>><a href="index.php?page=14">Downloads</a></li>
     <li <?php if(isset($_GET['page']) && $_GET['page']==15){ ?>   class="current" <?php  } ?> ><a href="index.php?page=15" >Support</a></li>
     <li <?php if(isset($_GET['page']) && $_GET['page']==12){ ?>   class="current" <?php  } ?> ><a href="index.php?page=12">Contact Us</a></li>
     <li <?php if((isset($_GET['page']) && $_GET['page']==17) || (isset($_GET['page']) && $_GET['page']==18) || (isset($_GET['page']) && $_GET['page']==19) || (isset($_GET['page']) && $_GET['page']==20)  ){ ?>   class="current" style="text-shadow: none;" <?php  } ?> ><a href="index.php?page=17">More Info</a>
            <ul>
           <li><a href="index.php?page=17">About Us</a></li>
           <li><a href="index.php?page=18">Terms and Conditions </a></li>
           <li><a href="index.php?page=19">Privacy policies</a></li>
           <li><a href="index.php?page=20">Refund and Cancellation</a></li>
         </ul>
    
    </ul></li>
</div>
<?php if ( (isset($_GET['page']) &&  $_GET['page']==2) || (isset($_GET['page']) &&  $_GET['page']==3) || (isset($_GET['page']) &&  $_GET['page']==4)  ){ ?>
<div id="tab_bar_wrapper">	
    <div id="tri_div_start"></div>    
        <div id="tab_wrapper">
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 1) { ?>id="tri_div_back_active"<?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($_GET['page']) && $_GET['page'] == 1) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Register</div>
            </div>
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 1) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_front" <?php } ?>  ></div>
        </div>
        <div id="tab_wrapper">
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 2) { ?> id="tri_div_back_active" <?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($_GET['page']) && $_GET['page'] == 2) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Select Plan</div>
            </div>
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 2) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_front" <?php } ?>  ></div>
        </div>
        <div id="tab_wrapper">
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 3) { ?> id="tri_div_back_active" <?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($_GET['page']) && $_GET['page'] == 3) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Checkout</div>
            </div>
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 3) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_front" <?php } ?>  ></div>
        </div>
        <div id="tab_wrapper">
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 4) { ?> id="tri_div_back_active" <?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($_GET['page']) && $_GET['page'] == 4) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Congrats</div>
            </div>        	
        </div> 
        <div <?php if (isset($_GET['page']) && $_GET['page'] == 4) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_end" <?php } ?>  ></div>   
</div>
<?php } else if(isset($_GET['page']) &&  $_GET['page']!=1) { ?>
  <div id="tab_bar_wrapper">	
    <div id="tri_div_start"></div>   
    
     <?php 
                    if(isset($_GET['page'])){ 
                    if( $_GET['page']==5 || $_GET['page']==7 || $_GET['page']==8 || $_GET['page']==9 || $_GET['page']==10 || $_GET['page']==11 || $_GET['page']==13){
                        ?>
     <div id="tab_wrapper">
        	<div  id="tri_div_back"   ></div>
            <div  id="tab_item"  >
                <div id="text_wrapper">
                  <?php  
                    switch ($_GET['page']){
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
                    if(isset($_GET['page'])){
                    switch ($_GET['page']){
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
                             echo 'Domain Price List / Year ';
                            break;
                         case 17: 
                             echo 'About Us';
                            break;
                        case 18: 
                             echo 'Terms and Conditions';
                            break;
                         case 19: 
                             echo ' Privacy policies';
                            break;
                        case 20: 
                             echo ' Refund and Cancellation';
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