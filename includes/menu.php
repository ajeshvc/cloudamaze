<ul id="menu-bar">
 <li class="current"><a href="index.php">Home</a></li>
 <li><a href="index.php?page=1&skip=false">Domain</a></li>
 <li><a href="index.php?page=0">Hosting</a>
     <ul>
       <li><a href="index.php?page=0">Shared Hosting</a></li>
       <li><a href="index.php?page=5">Virtual Private Servers</a></li>
       <li><a href="#">Dedicated Hosting</a></li>
     </ul>
 </li>     
 
 <li><a href="#">Services</a>
 	<ul>
         <li><a href="index.php?page=7">Corporate Email</a></li>
        <li><a href="#">SSL Certificate</a></li>
       <li><a href="#">Payment Gateway</a></li>
       <li><a href="#">Server Management</a></li>
       </ul>
 </li>
 <li><a href="#">Blog</a></li>
 <li><a href="index.php?page=6">Testimonials</a></li>
 <li><a href="#">Downloads</a></li>
 <li><a href="http://www.cloudamaze.com/support">24/7 Support</a></li>
 <li><a href="#">Contact Us</a></li>
</ul>
<div id="tab_bar_wrapper">	
    <div id="tri_div_start"></div>    
        <div id="tab_wrapper">
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 1) { ?>id="tri_div_back_active"<?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($_GET['page']) && $_GET['page'] == 1) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Register a Domain</div>
            </div>
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 1) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_front" <?php } ?>  ></div>
        </div>
        <div id="tab_wrapper">
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 2) { ?> id="tri_div_back_active" <?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($_GET['page']) && $_GET['page'] == 2) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Select Hosting Plan</div>
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
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 3) { ?> id="tri_div_back_active" <?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($_GET['page']) && $_GET['page'] == 3) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Congrats</div>
            </div>        	
        </div> 
        <div <?php if (isset($_GET['page']) && $_GET['page'] == 4) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_end" <?php } ?>  ></div>   
</div>