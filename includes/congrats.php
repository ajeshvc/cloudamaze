<?php
if (!isset($_SESSION['domain']) || !isset($_SESSION['invoice'])) {
   header('Location: index.php?page=1');
}
?>
<div id="content" >
    
    <div style="width: 100%;height: 100%" >
        <div style="width: 100%;height: 50%;margin-top: 10px;">
            <div style="float: left; margin-left: 60px;"><img src="images/love-clouds.png"/></div>
              <div style=" margin-top: 40px;">
                    You are awesome! <br/>
                  Your order on cloudamaze.com has been placed.<br/>
                  Your reference number is <b><?php  echo $_SESSION['invoice']; ?>.</b><br/>
                  Please pay Rs. <b><?php echo $_SESSION['total']; ?> INR </b> via NEFT to the below bank and contact our customer support. 	
                  
              </div>
             <div style="width: 100%;height: 50%;margin-top: 50px;">
            <div style="width:30%;float: left;text-align: right;height: 100%">
                 <div style="float: left;height: 100%;margin-right: 1px;"><img src="images/contact-signal.png" /></div>
                <div style="height: 100%;text-align: left;margin-left:10px">Call us on +91 890 750 9611 <br/> or  drop an email to <br/>support@cloudamaze.com</div>
             </div>
              <div style="width:45;">
                  <div style="float: left;margin-right: 0px;"><img src="images/wallet-money.png"/></div>
                    <div style="float: left;margin-left: 10px;text-align: left;">
                        Payments via NEFT to Bank : IDBI Bank,<br/>
                        Vazhuthacaud, Thiruvananthapuram,<br/>
                        Account Holder : HELLOINFINITY<br/>
                        IFSC Code : IBKL0000046<br/>
                        Account Number : 0046102000016320<br/>
                    </div>
              </div>
            </div>
        </div>
       
      
    <div id="buttons" >
        <div id="skip-domain" class="button">
            <div id="popup" ><a href="index.php?page=1" id="OpenContact"> Home </a></div>
            <img src="images/blue-botton.png" class="adjusted"/>
        </div>
    </div>


</div>

<?php

unset($_SESSION['domain']);
?>
