<?php
$name="";
$phone="";
$email="";
$couponcode="";
/*
 if ((isset($_SESSION['domain']) && $_SESSION['domain']=='' )|| !isset($_SESSION['domain']) ) {
  header('Location: index.php?page=0');
  }
*/
$_SESSION['domain']="";
  function getcoupontype($couponcode){
      $coupontype="";
 $result = mysql_query(" select coupon_type from coupon_settings where offer_id=( select offer_id from coupon where code='$couponcode' ) ");
 $row = mysql_fetch_array($result);
 if($row!=NULL){
     $coupontype=$row['coupon_type'];
 }   
   return $coupontype;    
}

function isCouponValid($couponcode){
    $flag1=false;
     $flag2=false;
    $used="";
    $apply_for_first="";
    // check no of used coupon
     $coupontype=getcoupontype($couponcode);      
                      if($coupontype=="multiple"){ // if multiple coupon for a offer
                          
                          $result = mysql_query(" SELECT count( offer_id ) AS used
                            FROM coupon
                            WHERE STATUS = '0'
                            AND offer_id = (SELECT offer_id FROM coupon WHERE code = '$couponcode' )  ");
                            
                          
                      }elseif ($coupontype=="single") { // if single coupon for a offer
                          
                          $result = mysql_query(" SELECT count( code ) AS used
                            FROM coupon_details
                            WHERE coupon_type = 'single' and code='$couponcode'  ");
                            
                      }
                      $row = mysql_fetch_array($result);
                            if($row!=NULL){
                                $used=$row['used']; 
                              }
                      
    

     
     
     //offer limit
     $result = mysql_query(" SELECT apply_for_first
FROM coupon_settings
WHERE offer_id=(SELECT offer_id FROM coupon WHERE code = '$couponcode' )
 ");
     $row = mysql_fetch_array($result);
     if($row!=NULL){
        $apply_for_first=$row['apply_for_first']; 
        
     }
     
     // compare used and offer limits
     if($used!="" && $apply_for_first!="" ){
         if($used<$apply_for_first){
             $flag1=true;
         }
         
     }
     
   // check status and expire date
    $exp_date="";
    $status="";
     $todays_date="";
     
   $result = mysql_query("  select expire,status from coupon,coupon_settings where coupon.offer_id=coupon_settings.offer_id and  coupon.code='$couponcode' ");
   $row = mysql_fetch_array($result);
   if($row!=NULL){
     $exp_date=$row['expire'];
     $status=$row['status'];
     $todays_date = date("Y-m-d"); 
     $today = strtotime($todays_date); 
     $expiration_date = strtotime($exp_date); 
     if ($expiration_date > $today && $status=='1') { 
        
         $flag2=true;
     } 
    
  
 }
 
 if($flag1 && $flag2){
  return true;  
 }else{
     return false;
 }
 
}




function getOfferprice($couponcode){
    $offerprice=0;
    $result = mysql_query(" select offer_price from coupon where code='$couponcode'");
 $row = mysql_fetch_array($result);
 if($row!=NULL){
     $offerprice=$row['offer_price'];
   }  
   return $offerprice;  
 
}



function isOfferpriceIn($couponcode){
      $offerpricein="";
 $result = mysql_query(" select offer_price_in from coupon where code='$couponcode'");
 $row = mysql_fetch_array($result);
 if($row!=NULL){
     $offerpricein=$row['offer_price_in'];
 }   
   return $offerpricein;  
 
}


$plans[] = "";
$planid[] = "";
$hostingdetails = "";
$captchaflag = 0;
$hostingprpname[] = "";
$hostingprpid[] = "";
$couponcode="";
$offerprice="";
$discount="";
$coupontext="";

if (isset($_POST["back"])) {
    if(isset($_SESSION['choice'])){
        unset($_SESSION['choice']); 
    }
}
if (isset($_POST["confirm"])) {
 
    $name="";
$phone="";
$email="";
$couponcode="";
   
if(isset($_POST['name'])){
 $name=$_POST['name'];   
 }
 if(isset($_POST['phone'])){
 $phone=$_POST['phone'];   
 }
 if(isset($_POST['email']) && check_email_address($_POST["email"]) == TRUE){
 $email=$_POST['email'];   
 }
 if(isset($_POST['coupon'])){
 $couponcode=$_POST['coupon'];   
 }
 
   if (isset($_POST['domain']) && $_POST['domain'] != "") {
        $domain = $_POST['domain'];
        //validate domain
        if (preg_match("/^($label)\\.($tld)$/", $domain, $match) && in_array($match[2], $tld_list)) {
            $_SESSION['domain'] = $domain;
          
        }
        else{
            if(isset($_SESSION['domain'])){
               $_SESSION['domain']="";
            }
        }
    }
   

    $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

    if (!$resp->is_valid) {
        // What happens when the CAPTCHA was entered incorrectly
        $captchaflag = 0;
        // die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
        //  "(reCAPTCHA said: " . $resp->error . ")");
    } else {
        // Your code here to handle a successful verification
        $captchaflag = 1;
    }

    if (isset($_POST["email"]) && $_POST["email"] != "" && $captchaflag == 1 && $_SESSION['domain'] !="") {
        $phone = $_POST["phone"];
        $name = $_POST["name"];
        if (check_email_address($_POST["email"]) == TRUE && $phone != "" && $name != "") {

            if (isset($_POST["hostingdetails"]) && $_POST["hostingdetails"] != "") {
                $hostingdetails = $_POST["hostingdetails"];
                $currentdate = date("Y/m/d");
                
                  //---------------------
                 if (isset($_POST["coupon"])&& $_POST["coupon"]!=""){
                     
                $couponcode=$_POST["coupon"];
                  if(isCouponValid($couponcode)){
                   $flag=0;
                   $offerprice=getOfferprice($couponcode);
                   $offerpricein=isOfferpriceIn($couponcode);
                   if($offerpricein=='RS'){
                    $discount=$offerprice;  
                    $flag=1;
                   }elseif($offerpricein=='%'){
                      $discount=$_SESSION['total']*($offerprice/100);   
                      $flag=1;
                    }
                    if($flag==1){
                      $finalprice=$_SESSION['total']-$discount;
                    $_SESSION['total']=$finalprice;
                    $coupontext="|"."Coupon Code Valid : ".$couponcode."|"."Discount RS : ".$discount." INR ||"."+Grand Total RS : ".$finalprice." INR Only . ";  
                        //select offer type    
                      $coupontype=getcoupontype($couponcode);      
                      if($coupontype=="multiple"){
                           // set coupon as used
                    mysql_query(" update coupon  set status='0' where code='$couponcode' ");     
                      } 
                      // store invoice and coupon code
                     mysql_query(" insert into  coupon_details (id,code,coupon_type)values('$id','$couponcode','$coupontype') ");     
                     
                    }
                    
               } 
    }
                //---------------------
    if($coupontext==""){
                    $coupontext="||"."+Grand Total RS : ".$_SESSION['total']." INR Only . ";
                }
                
                $domain = $_SESSION['domain'];
                $hostingdetailstodb = "|" . $name . "|" . $phone . "|" . $_POST["email"] . $hostingdetails.$coupontext;
                $hostingdetailstodb = str_replace("+", "", $hostingdetailstodb);
                mysql_query("INSERT INTO hosting_details(date,domain,details) 
                VALUES('$currentdate','$domain','$hostingdetailstodb') ");
                 $id=mysql_insert_id();
                $invoice = "#hi00". $id;
                
                $_SESSION['invoice'] = $invoice;
               
              
    
                $from = $_POST["email"];

                $to = $to_email;
                if ($from != "" && $phone != "" && $hostingdetails != "") {


                    $message = "|Hosting Details of - " . $domain . "|Invoice Id " . $invoice . $hostingdetails.$coupontext;
                    $subject = $name . "- New Hosting Request";
                    $message = $message . "\n\n" . "-------------------\n" . $name . "\n" . $phone . "\n" . $_POST["email"] . "\n" . "on-" . $currentdate;
                    $message = str_replace("|", "\n\n", $message);
                    $message = str_replace("+", "", $message);
                    $headers = "From: " . $name . " " . $from;
                    mail($to, $subject, $message, $headers);
                    sleep(5);
                    include_once "includes/swift/lib/swift_required.php";
                    $from = array($_POST["email"] => $name);
                    $message = "Hello " . $name . ",
                            ||  This is a notice that an invoice has been generated on " . $currentdate . "
                            ||<b>Invoice Id </i>" . $invoice . "</i></b>
                            
                            ||<b>Details of Hosting Package you Purchased for your Domain Name - " . $domain . "</b>|" . $hostingdetails .$coupontext. "</b> 
                            |" . "-----------------------------------------------
                            ||<i>Your account will activated as soon as you complete the payment process.|you can pay your Hosting bill through NEFT.</i>
                            ||<b>Our bank account details are:</b>
                            |
                            |Payments via NEFT to
                            |Bank   : IDBI Bank
                            |Branch : Vazuthacad,Thiruvananthapuram
                            |Account Holder: HELLOINFINITY
                            |IFSC Code     : IBKL0000046
                            |Account Number: 0046102000016320
                            |" . "Call +91 890-750-9611 after depositing amount.<br>-----------------------------------------------<br/><b>Cloudamaze - </b><i>get amazed!</i>";
                    $message = str_replace("|", "<br/></br>", $message);
                    $message = str_replace("+", "<b>", $message);
                    $subject = "Hi " . $name . " Your Hosting Request";

                    //Sending mail via mandrill
                    $transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
                    $transport->setUsername($mandril_user_name);
                    $transport->setPassword($mandril_key);
                    $swift = Swift_Mailer::newInstance($transport);
                    sleep(2);
                    $html = "" . $message . "";
                    $maildetails = new Swift_Message($subject);
                    $maildetails->setFrom($to);
                    $maildetails->setBody($html, 'text/html');
                    $maildetails->setTo($from);
                    $maildetails->addPart($message, 'text/plain');

                    if ($recipients = $swift->send($maildetails, $failures)) {
                        echo 'Message successfully sent!';
                    } else {
                        echo "There was an error:\n";
                        //print_r($failures);
                    }


                    unset($_SESSION['choice']);
                    header('Location:index.php?page=4');
                }
            }
        }
    }
}
if (isset($_POST["choice"]) || (isset($_SESSION['choice']) && $_SESSION['choice']!="" )) {
    if (isset($_POST["choice"])){
    $_SESSION['choice']=$_POST["choice"];
   }
    $planid[0] = $_SESSION['choice'];
    $result = mysql_query(" select * from plans  where plan_id=$planid[0] ");
    
} else {
    $result = mysql_query(" select * from plans order by plan_id asc ");
}


$i = 0;
while ($row = mysql_fetch_array($result)) {
    $plans[$i] = $row['name'];
    $planid[$i] = $row['plan_id'];
    $more = $row['more'];
    $i++;
}
$i = 0;
// getting plan properties
$result = mysql_query(" select * from hosting_properties order by pr_id asc ");
while ($row = mysql_fetch_array($result)) {
    $hostingprpname[$i] = $row['name'];
    $hostingprpid[$i] = $row['pr_id'];
    $i++;
}
?>
<div id="content" style="alignment-adjust: central; ">

    <form  name="form" method="post" action="index.php?page=13">   
        
<div class="hosting_content_outer">
        <div class="hosting_table_div">                
           <div class="hosting_row_div">
                <div class="first_hosting_col_div" id="first_header1">
                 	Plan Name 
                </div>
<?php foreach ($hostingprpname as $hostprp) { ?>
                     <div class="hosting_col_div" id="header1">
                   <?php echo $hostprp; ?>
                    </div>   
                    <?php } ?>
            </div>
                    <?php
                    $i = 0;
                    $colorid = 1;

                    foreach ($planid as $value) {
                        ?>
            
                    
                <div class="hosting_row_div">      
                <div class="first_hosting_col_div" <?php  if ($colorid % 2 == 0) {  ?> id="even" <?php  } else { ?> id="odd"<?php } ?> >
                 	<span id="header2">
                            <?php if (!isset($_POST["choice"]) && !isset($_SESSION['choice'])   ) { ?>  <input type="radio" name="choice" onclick="this.form.submit();" value="<?php echo $planid[$i]; ?>" /> <?php } ?> <?php echo $plans[$i]; ?><?php
                            if (isset($_POST["choice"]) || (isset($_SESSION['choice']) && $_SESSION['choice']!="" ) ) {
                                $hostingdetails.="|" . $plans[$i];
                            }
                            ?></span>
                </div>
                        <?php
                        foreach ($hostingprpid as $prpid) {
                                 ?>  <div class="hosting_col_div" <?php  if ($colorid % 2 == 0) {  ?> id="even" <?php  } else { ?> id="odd"<?php } ?>>
                    <?php

                            $result = mysql_query(" 
     
SELECT  hosting_properties.name,hosting_plans.value,hosting_properties.pr_id ,hosting_plans.pr_id
FROM hosting_properties
INNER JOIN hosting_plans ON hosting_plans.pr_id = hosting_properties.pr_id
WHERE hosting_plans.plan_id =$value and hosting_properties.pr_id=$prpid

     
     ");
                          
                           
                            $row = mysql_fetch_array($result);
                            if ($row != NULL) {

                                echo $row['value'];
                                if (isset($_POST["choice"])  || (isset($_SESSION['choice']) && $_SESSION['choice']!="" ) ) {
                                    $hostingdetails.="|" . $row['name'] . "-" . $row['value'];
                                    if ($row['pr_id'] == '11') {
                                        $peryear = $row['value'] * 12;
                                       // $hostingdetails.="||Total RS :" . $peryear . ".00 INR Only .";
                                        $_SESSION['total'] = $peryear;
                                    }
                                }
                            } else {
                                echo "  ";
                            }
                            ?> 
                </div>

                            <?php }
                        ?>
                 </div>  
                        <?php
                        $colorid++;
                        $i++;
                        ?> <?php
                        
                }
                ?>


       
        </div>
        </div>


 <?php
                  if (isset($_POST["choice"])|| (isset($_SESSION['choice']) && $_SESSION['choice']!="" ) ) {
                    ?>


            <textarea name="hostingdetails" hidden="hidden" hidden  readonly="readonly">
            <?php
            echo $hostingdetails;
            ?>
            </textarea>

            <div align="center" >
              
               <p> <h3> <?php echo $more; ?></h3></p>
                <h4><i>Drop in your Name,Phone number,Email,Coupon Code and hit Confirm</i></h4>
                    <table border="0">
                        <tr><td><i>Domain Name</i></td> <td><input type="text" name="domain" placeholder="Domain Name" value="<?php echo $_SESSION['domain'];  ?>" />*</td></tr>
                        <tr><td><i>Full Name </i></td> <td><input type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>" />*</td></tr>
                    <tr><td><i>Phone Number</i></td> <td><input type="text" name="phone" placeholder="Phone" value="<?php echo $phone; ?>" />*</td></tr>
                    <tr><td><i>Email Address</i></td> <td> <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" />*</td></tr>
                      <tr><td><i>Coupon Code</i></td> <td> <input type="text" name="coupon" placeholder="Coupon Code" value="<?php echo $couponcode; ?>" /> </td></tr>
                    <tr><td colspan="2"><?php echo recaptcha_get_html($publickey); ?></td></tr>	
                 </table>
                <div id="button_container" >
                    <div id="register-domain" class="button">
                        <input  type="submit" name="confirm" value="Confirm" class="btnclass" style="background-color: #60c8d8 "/>
                     
                    </div>
                    <div id="register-domain" class="button">
                        <input  type="submit" name="back" value="Change Plan" class="btnclass" style="background-color: #60c8d8 "/>
                     </div>
                </div>
            </div>

        
    <?php
}
?>
        </form>
</div>
