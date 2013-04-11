
<?php
$_SESSION['domain']='';
unset($_SESSION['domain']);
if(isset($_SESSION['choice'])){
        unset($_SESSION['choice']); 
    }
    if(isset( $_SESSION['domainprice'])){
        unset( $_SESSION['domainprice']); 
    }
   
    // header('Location:index.php?page=1&skip=false');
?>
<div id="content">

 <div class="offer_outer_container">
    	
        <div class="offer_content_container">
        
            <div class="offer_cloud_container">                
                <img src="images/green_cloud.png" />
                <div class="offer_cloud_text">.in</div>
                <div class="offer_price_text" style="color: #9cc33c;">Rs.528</div>              
            </div>
            
            <div class="offer_amount_container">   	
                +
            </div>
            
            <div class="offer_cloud_container">
                <img src="images/blue_cloud.png" /> 
                <div class="offer_cloud_text">1GB</div>
                <div class="offer_price_text" style="color: #60c8d8;">Rs.1020</div>                 			    
            </div>
            
            <div class="offer_amount_container">    	
                =
            </div>
            
            <div class="offer_amount_container">
                <span style="color: #60c8d8;">&#8377;</span>1000    
            </div>
        
        </div>
        <div class="offer_notes_container">
    		<div class="offer_notes_heading">Notes</div>
            <div class="offer_notes_content">
            	This Promo is applicable to the first year of Registration only.
                <br/>Renewals and Transfer-Ins will not attract this Promo Pricing.
                <br/>There are no restrictions on the number of Domains that can be Registered during this period.
                <br/>This offer is valid till 30th April 2013. 
			</div>        
    	</div>     
    </div>            
</div>
