<?php
if ((isset($_SESSION['domain']) && $_SESSION['domain']=='' )|| !isset($_SESSION['domain']) || !isset($_SESSION['total']) || !isset($_SESSION['invoice']) ) {
  header('Location: /home');
}
 
?>
<div id="content" >
    
    <div  id="maindiv" >
        <div  id="thanksdiv">
            <div id="loveimagediv"><img src="images/love-clouds.png"/></div>
              <div  id="pricediv">
                  <font  style=" font-size: 23px;  text-align: left;"> <b> You are awesome! </b> </font><br/>
                  Your order on cloudamaze.com has been placed.<br/>
                  Your reference number is <font  style="color:#60c8d8;"><b><?php  echo  $_SESSION['invoice']; ?>.</b></font><br/>
                  Please pay Rs. <b><font  style="color:#9dc33c;"><?php  echo $_SESSION['total']; ?> INR </font> </b> via NEFT to the below bank and contact our customer support. 	
                  
              </div>
             <div  id="contactdiv">
            <div  id="phoncontactdiv">
                 <div  id="contactdivimage"><img src="images/contact-signal.png" /></div>
                <div  id="contactinfodiv">Call us on <b> +91 890 750 9611 </b><br/> or  drop an email to <br/>support@cloudamaze.com</div>
             </div>
              <div  id="bankaccountdiv">
                  <div  id="accountimagediv"><img src="images/wallet-money.png"/></div>
                    <div  id="bankinfodiv">
                        Payments via NEFT to Bank : IDBI Bank,<br/>
                        Vazhuthacaud, Thiruvananthapuram,<br/>
                        Account Holder : HELLOINFINITY<br/>
                        IFSC Code : IBKL0000046<br/>
                        Account Number : 0046102000016320<br/>
                    </div>
              </div>
            </div>
        </div>
      
      
<!--    <div id="buttons" >-->
        <div id="skip-domain" class="button">
            <a href="/home" id="OpenContact" class="btnclass"> Home </a>
        </div>
<!--    </div>-->


</div>
</div>
<?php

unset($_SESSION['domain']);
unset($_SESSION['total']);
unset($_SESSION['invoice']);
?>
