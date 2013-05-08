<?php 
        if(isset($_POST['more'])){
             $sql = "select * FROM domain_offer ";
         }  else {
             $sql = "select * FROM domain_offer LIMIT 0 , 5  ";
        }
       
        $result = mysql_query($sql) or die(mysql_error());
 ?>
<div id="content">
  <div class="offer_outer_container">
    	
     <div class="offer_content_container" >
        <?php
            while ($row = mysql_fetch_array($result)) {
        ?>
            <div class="offer_cloud_container">                
                <img src="images/slash_cloud.png" />
                <div class="offer_cloud_text">.<?php echo $row['domain_name']; ?> </div>
                 <div class="doriginalprice" style="color:#9cc33c; margin-top: 20px;"><strike> &#8377; <?php echo $row['original_price']; ?> </strike></div>        
                <div class="offer_price_text" style="color: #60c8d8;">  &#8377; <?php echo $row['offer_price']; ?></div>              
            </div>
            
            <div class="offer_amount_container">    	
                &nbsp;
            </div>
            
        <?php  } ?> 
        </div>
   <?php 
   if(!isset($_POST['more'])){ ?>
        <form method="post"  action="/domain-slash-down"/>
        <input type="submit" name="more" class="btnclass" value="View More"  />
        </form> 
   <?php  } ?>
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
