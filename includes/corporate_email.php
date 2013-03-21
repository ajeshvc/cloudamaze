<?php 
    $name="";
    $cp="";
    $address="";
    $phone="";
    $mobile="";
    $email="";
    $web="";
    $des="";
    $invoice="";
if(isset($_POST['submit'])&&$_POST['submit']=='Submit'){
   
    $flag=1;
   if(isset($_POST['name'])){
    $name=$_POST['name'];   
   } 
    if(isset($_POST['cp'])){
    $cp=$_POST['cp'];   
   } 
    if(isset($_POST['address'])){
    $address=$_POST['address'];   
   } 
    if(isset($_POST['phone'])){
    $phone=$_POST['phone'];   
   } 
    if(isset($_POST['mobile'])){
    $mobile=$_POST['mobile'];   
   } 
    if(isset($_POST['email'])){
    $email=$_POST['email'];   
   } 
    if(isset($_POST['web'])){
    $web=$_POST['web'];   
   } 
    if(isset($_POST['des'])){
    $des=$_POST['des'];   
   } 
   if(check_email_address($email)==FALSE){
       $email="";
       $flag=0;
   }
   if($name=="" || $cp=="" || $address=="" || $mobile=="" || $email=="" || $des==""   ){
       $flag=0;
   } 
  
   $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
   if (!$resp->is_valid) {
        // What happens when the CAPTCHA was entered incorrectly
        $flag = 0;
     } 
   if($flag==1){
       // insert into db
       $currentdate = date("Y/m/d");
                mysql_query("INSERT INTO query_form(form_type,date,name,contact_point,address,phone,mobile,email,web,description) 
                VALUES('1','$currentdate','$name','$cp','$address','$phone','$mobile','$email','$web','$des') ");
                 $id=mysql_insert_id();
                 $invoice = "#hiEmail00". $id;
                 
              // mail   
                    $email_details="|Name           : $name".
                                   "|Contact Person : $cp".
                                   "|Addres         :$address".
                                   "|Phone          :$phone".
                                   "|Email          :$email".
                                   "|Web            :$web".
                                   "|Description    :$des";
                    $from = $_POST["email"];
                    $to = $to_email;
                    $message = "|Corporate Email " . "|Invoice Id " . $invoice . $email_details;
                    $subject = $name . "- New Corporate Email Request";
                    $message = $message . "\n\n" . "-------------------\n". "on-" . $currentdate;
                    $message = str_replace("|", "\n\n", $message);
                    $message = str_replace("+", "", $message);
                    $headers = "From: " . $name . " " . $from;
                    mail($to, $subject, $message, $headers);
                  
                
   }
}
?>

<div class="form_outer">
    <div class="banner_outer">
        <img src="images/queryform/corp-email.png" class="banner_img"/>
        <div class="data_text">
       CloudAmaze’s  Corporate email service is one of best acclaimed service. Real time delivery: It delivers emails in real-time, i.e., you click send, snap! Its in your recipient’s mailbox. You can access your email on Android, Blackberry, Ios, Windows phones, PC, Mac, Bada, Symbian, and on all Unix and Linux based machines. CloudAmaze’s Corporate email has a never down policy with 99.99% uptime. You won’t notice any down time. You will be assisted round the clock, out team is up 24x7 to provide you help.  Drop in a request so that we can contact you back. Please make a short description of what you would like to implement.
        </div>
    </div>
    <div class="form_content">
    	<div id="stylized" class="myform">
            <?php if($invoice==""){ ?>
            <form id="form" name="form" method="post" action="index.php?page=7">
                <h1>Query From</h1>
                <p>Corporate Email</p>
                
                <div>
                    <label>Name *
                    <span class="small">Your company name</span>
                    </label>
                    <input type="text" name="name" id="name" value="<?php echo $name?>" />
                    
                    <label>Contact Point *
                    <span class="small">Person to contact</span>
                    </label>
                    <input type="text" name="cp" id="cp" value="<?php echo $cp ?>" />
                    
                    <label>Address *
                    <span class="small">Current address</span>
                    </label>
                    <input type="text" name="address" id="add" value="<?php echo $address ?>" />
                    
                    <label>Phone 
                    <span class="small">Valid phone number</span>
                    </label>
                    <input type="text" name="phone" id="ph" value="<?php echo $phone ?>" />
                    
                    <label>Mobile *
                    <span class="small">Valid mobile number</span>
                    </label>
                    <input type="text" name="mobile" id="mob"  value="<?php echo $mobile ?>" />
                    
                    <label>Email *
                    <span class="small">Valid email id</span>
                    </label>
                    <input type="text" name="email" id="email"  value="<?php echo $email ?>" />
                    
                    <label>Web
                    <span class="small">Your website</span>
                    </label>
                    <input type="text" name="web" id="web" value="<?php echo $web ?>" />
                    
                    <label>Description *
                    <span class="small">Brief description of requirement</span>
                    </label>
                    <textarea name="des" id="des"><?php echo $des ?></textarea> 
                    <?php echo recaptcha_get_html($publickey); ?>
                    
                </div>
                <div class="btn_wrapper">
                	<button type="reset">Reset</button>
                        <button type="submit" name="submit" value="Submit">Submit</button>
                </div>
                <div class="spacer"></div>
            
            </form>
            <?php }  else { ?>
            <b>Your request has been received</b> (Request ID :<?php echo $invoice; ?> ).<br/> Cloudamaze sales team will contact you shortly. <br/>Thanks for contacting cloudamaze.

            <br/>You can call +91 890 750 9611 for any inquires if needed.
            <div class="btn_wrapper">
                	<a href="index.php?page=0" id="OpenContact" class="btnclass"> Home </a>
                </div>

         <?php   } ?>
		</div>    
    </div>
</div>