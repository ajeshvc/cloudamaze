<?php
if (isset($_POST['vpsradio']) && $_POST['vpsradio'] != "") {
    $_SESSION['planchoice'] = $_POST['vpsradio'];
}

  if (isset($_POST['confirm']) && $_POST['confirm'] == "Confirm") {
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
    if (isset($_POST["email"]) && $_POST["email"] != "" && $captchaflag == 1) {
        $phone = $_POST["phone"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        if (check_email_address($_POST["email"]) == TRUE && $phone != "" && $name != "" && $address != "") {
          $addresstodb="|".$name."|".$address."|".$phone."|".$_POST["email"]."|";
                if (isset($_POST['hostingname']) && $_POST['hostingname'] != "") {
                    $hostingname = $_POST['hostingname'];
                    //validate domain
                    if (preg_match("/^($label)\\.($tld)$/", $hostingname, $match) && in_array($match[2], $tld_list)) {
                        $vpsdetails = "";
                        $total = 0;
                        $extraip = $_POST['extraip'];
                         $inusd=$extraip * 1.5;
                        if ($extraip) {
                           $extraip = "Extra IP : " . $extraip . " $" . $extraip * 1.5 . " USD";
                        } else {
                            $extraip = "Extra IP : None";
                        }
                        switch ($_SESSION['planchoice']) {
                            case 1:
                                $vpsdetails = "|Plan Name : FogVZ
                                    |Guaranteed RAM : 192 MB
                                    |vSwap : 32 MB
                                    |Disk Storage : 15GB
                                    |Monthly Transfer : 300GB
                                    |CPU Cores : 2
                                    |IPv4 Addresses : 1
                                    |Root Access : Yes
                                    |Quick Backup : Yes
                                    |Server Connection Speed : 100 megabit/second
                                    |Managed Service Inclusive : No
                                    ";
                                $total=100;
                                break;
                            case 2:
                                $vpsdetails = "|Plan Name : StratusVZ
                                    |Guaranteed RAM : 256 MB
                                    |vSwap : 64 MB
                                    |Disk Storage : 20GB
                                    |Monthly Transfer : 500GB
                                    |CPU Cores : 2
                                    |IPv4 Addresses : 1
                                    |Root Access : Yes
                                    |Quick Backup : Yes
                                    |Server Connection Speed : 100 megabit/second
                                    |Managed Service Inclusive : No
                                    ";
                                $total=200;
                                break;
                            case 3:
                                $vpsdetails = "|Plan Name : CumulusVZ
                                    |Guaranteed RAM : 512 MB
                                    |vSwap : 96 MB
                                    |Disk Storage : 35GB
                                    |Monthly Transfer : 750GB
                                    |CPU Cores : 2
                                    |IPv4 Addresses : 1
                                    |Root Access : Yes
                                    |Quick Backup : Yes
                                    |Server Connection Speed : 100 megabit/second
                                    |Managed Service Inclusive : No
                                    ";
                                $total=300;
                                break;
                            case 4:
                                $vpsdetails = "|Plan Name : NimbusVZ
                                    |Guaranteed RAM : 1024 MB
                                    |vSwap : 128 MB
                                    |Disk Storage : 50GB
                                    |Monthly Transfer : 1000GB
                                    |CPU Cores : 4
                                    |IPv4 Addresses : 2
                                    |Root Access : Yes
                                    |Quick Backup : Yes
                                    |Server Connection Speed : 100 megabit/second
                                    |Managed Service Inclusive : No
                                    ";
                                $total=300;
                                break;
                           case 5:
                                $vpsdetails = "|Plan Name : CirrusVZ
                                    |Guaranteed RAM : 1536MB
                                    |vSwap : 256 MB
                                    |Disk Storage : 75GB
                                    |Monthly Transfer : 1500GB
                                    |CPU Cores : 4
                                    |IPv4 Addresses : 2
                                    |Root Access : Yes
                                    |Quick Backup : Yes
                                    |Server Connection Speed : 100 megabit/second
                                    |Managed Service Inclusive : No
                                    ";
                                $total=300;
                                break;
                        }
                        $totalusdtoinr = "";
                        // get Current INR Rate
                        $url = 'http://rate-exchange.appspot.com/currency?from=USD&to=INR';
                        $data = "";
                        $data = helloinfinityCallAPI('GET', $url, $data);
                        $datajson = json_decode($data, TRUE);
                        $rate=$datajson['rate'];
                        //calculate INR
                        if($inusd!=0){
                        $total+=($inusd*$rate);
                        }
                        $total=  ceil($total);
                        
                         
                          $vpsdetailstodb=$vpsdetails."|".$extraip."|Total : ".$total." INR";


                          // insert into db
                          $currentdate = date("Y/m/d");
                          mysql_query("INSERT INTO vps_details(date,host_name,details,address)
                          VALUES('$currentdate','$hostingname','$vpsdetailstodb','$addresstodb') ");
                          $id=mysql_insert_id();
                          $invoice = "#hivps00". $id;
                          
                          //mail
                          $from = $_POST["email"];
                          $to = $to_email;
                          $vpsdetailstomail=$vpsdetails."|".$extraip."|+Total : ".$total." INR Only.";
                          
                    $message = "|VPS Details of - " . $hostingname . "|Invoice Id " . $invoice . $vpsdetailstomail;
                    $subject = $name . "- New VPS Request";
                    $message = $message . "\n\n" . "-------------------\n" . $name . "\n" . $phone . "\n" . $_POST["email"] . "\n" . "on-" . $currentdate;
                    $message = str_replace("|", "\n\n", $message);
                    $message = str_replace("+", "", $message);
                    $headers = "From: " . $name . " " . $from;
                    mail($to, $subject, $message, $headers);
                    sleep(5);
                    //mail via mandrill
                    include_once "includes/swift/lib/swift_required.php";
                    $from = array($_POST["email"] => $name);
                    $message = "Hello " . $name . ",
                            ||  This is a notice that an invoice has been generated on " . $currentdate . "
                            ||<b>Invoice Id </i>" . $invoice . "</i></b>
                            
                            ||<b>Details of VPN Package you Purchased for your Host Name - " . $hostingname . "</b>|" . $vpsdetailstomail . "</b> 
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
                    $subject = "Hi " . $name . " Your VPS Request";

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
                       // echo 'Message successfully sent!';
                    } else {
                       // echo "There was an error:\n";
                        //print_r($failures);
                    }
 
                          $_SESSION['total']=$total;
                          $_SESSION['invoice'] = $invoice;
                          $_SESSION['domain'] = $hostingname;
                          unset($_SESSION['planchoice']);
                          header('Location:index.php?page=4');
                         
                    }
                }
            
        }
    }
}
?>

<div id="content" style="alignment-adjust: central; padding-bottom:5%">
    <form  name="form" method="post" action="index.php?page=5">   
        <div style="float: left;text-align: left; width: 5%">&nbsp;</div>
        <div></div> 

<?php if (!isset($_POST['vpsradio'])) { ?>
        
   <div class="pricing_table pricing_six">
  	<ul class="pricing_column_first">
        <li class="pricing_header1"></li>
        <li class="pricing_header2"><span>Choose a Plan</span></li>
        <li class="odd"><span>Guaranteed RAM</span></li>
        <li class="even"><span>vSwap</span></li>
        <li class="odd"><span>Disk Storage</span></li>
        <li class="even"><span>Monthly Transfer</span></li>
        <li class="odd"><span>CPU Cores</span></li>
        <li class="even"><span>IPv4 Addresses</span></li>
        <li class="odd"><span>Root Access</span></li>
        <li class="even"><span>Quick Backup</span></li>
        <li class="odd"><span>Server Connection Speed</span></li>        
        <li class="even"><span>Managed Service Inclusive</span></li>
        <li class="even"><span class="pricing_no" id="crossmark">Select</span></li>
    </ul>
    
    <ul class="pricing_column gradient_yellow">
        <li class="pricing_header1">FogVZ</li>
        <li class="pricing_header2">&#8377; 190 <span>/mo.</span></li>
        <li class="odd"><span>192 MB</span></li>
        <li class="even"><span>32 MB</span></li>
        <li class="odd"><span>15GB</span></li>
        <li class="even"><span>300GB</span></li>
        <li class="odd"><span>2</span></li>
        <li class="even"><span>1</span></li>
        <li class="odd"><span class="pricing_yes" id="checkmark">&#10004;</span></li>
        <li class="even"><span class="pricing_yes" id="checkmark">&#10004;</span></li>
        <li class="odd"><span>100 megabit/second</span></li>
        <li class="even"><span class="pricing_no" id="crossmark">&#10008;</span></li>
        <li class="even"><span class="pricing_no" id="crossmark"><input type="radio" name="vpsradio" value="1" onclick="this.form.submit();" />Choose</span></li>
    </ul>
    
    <ul class="pricing_column gradient_yellow">
        <li class="pricing_header1">StratusVZ</li>
        <li class="pricing_header2">&#8377; 270<span>/mo.</span></li>
        <li class="odd">256 MB</li>
        <li class="even">64 MB</li>
        <li class="odd">20GB</li>
        <li class="even">500GB</li>
        <li class="odd">2</li>
        <li class="even">1</li>
        <li class="odd"><span class="pricing_yes" id="checkmark">&#10004;</span></li>
        <li class="even"><span class="pricing_yes" id="checkmark">&#10004;</span></li>
        <li class="odd">100 megabit/second</li>
        <li class="even"><span class="pricing_no" id="crossmark">&#10008;</span></li>
        <li class="even"><span class="pricing_no" id="crossmark"><input type="radio" name="vpsradio" value="2" onclick="this.form.submit();" />Choose</span></li>
    </ul>
    
    <ul class="pricing_column gradient_yellow">
        <li class="pricing_header1">CumulusVZ</li>
        <li class="pricing_header2">&#8377; 430 <span>/mo.</span></li>
        <li class="odd"><span>512 MB</span></li>
        <li class="even"><span>96 MB</span></li>
        <li class="odd"><span>35GB</span></li>
        <li class="even"><span>750GB</span></li>
        <li class="odd"><span>2</span></li>
        <li class="even"><span>1</span></li>
        <li class="odd"><span class="pricing_yes" id="checkmark">&#10004;</span></li>
        <li class="even"><span class="pricing_yes" id="checkmark">&#10004;</span></li>
        <li class="odd"><span>100 megabit/second</span></li>
        <li class="even"><span class="pricing_no" id="crossmark">&#10008;</span></li>
        <li class="even"><span class="pricing_no" id="crossmark"><input type="radio" name="vpsradio" value="3" onclick="this.form.submit();" />Choose</span></li>
    </ul>
    
    <ul class="pricing_column gradient_yellow">
        <li class="pricing_header1">NimbusVZ</li>
        <li class="pricing_header2">&#8377; 590<span>/mo.</span></li>
        <li class="odd"><span>1024 MB</span></li>
        <li class="even"><span>128 MB</span></li>
        <li class="odd"><span>50GB</span></li>
        <li class="even"><span>1000GB</span></li>
        <li class="odd"><span>4</span></li>
        <li class="even"><span>2</span></li>
        <li class="odd"><span class="pricing_yes" id="checkmark">&#10004;</span></li>
        <li class="even"><span class="pricing_yes" id="checkmark">&#10004;</span></li>
        <li class="odd"><span>100 megabit/second</span></li>
        <li class="even"><span class="pricing_no" id="crossmark">&#10008;</span></li>
        <li class="even"><span class="pricing_no" id="crossmark"><input type="radio" name="vpsradio" value="4" onclick="this.form.submit();" />Choose</span></li>
    </ul>
    
    <ul class="pricing_column gradient_yellow">
        <li class="pricing_header1">CirrusVZ</li>
        <li class="pricing_header2">&#8377; 850<span>/mo.</span></li>
        <li class="odd"><span>1536 MB</span></li>
        <li class="even"><span>256 MB</span></li>
        <li class="odd"><span>75GB</span></li>
        <li class="even"><span>1500GB</span></li>
        <li class="odd"><span>4</span></li>
        <li class="even"><span>2</span></li>
        <li class="odd"><span class="pricing_yes" id="checkmark">&#10004;</span></li>
        <li class="even"><span class="pricing_yes" id="checkmark">&#10004;</span></li>
        <li class="odd"><span>100 megabit/second</span></li>
        <li class="even"><span class="pricing_no" id="crossmark">&#10008;</span></li>
        <li class="even"><span class="pricing_no" id="crossmark"><input type="radio" name="vpsradio" value="5" onclick="this.form.submit();" />Choose</span></li>
    </ul>
    
</div>
        
        
        
           
<?php } ?> 
<?php if (isset($_POST['vpsradio']) && $_POST['vpsradio'] != "") { ?>
            <div align="center" >
                <p> <h3></h3></p>
                <h4><i>Drop in your Hosting Name,Name,Address ,Phone number,Email and hit Confirm</i></h4>
                <table border="0">
                    <tr><td><i>Host Name</i></td> <th align="left"><input type="text" name="hostingname" placeholder="Server Nick Name" />*</th></tr>
                    <tr><td><i>Extra IP Address</i></td> <td><select name="extraip">
                                <option value="0">None</option>
    <?php for ($i = 1; $i <= 20; $i++) {
        ?><option value='<?php echo $i; ?>'><?php echo $i . ' Extra IP $' . (1.5 * $i) . ' USD'; ?></option>
    <?php } ?>

                            </select></td></tr>
                    <tr><td><i>Full Name </i></td> <td><input type="text" name="name" placeholder="Your Name" />*</td></tr>
                    <tr><td><i>Address</i></td> <td><input type="text" name="address" placeholder="Your Address" />*</td></tr>
                    <tr><td><i>Phone Number</i></td> <td><input type="text" name="phone" placeholder="Phone" />*</td></tr>
                    <tr><td><i>Email Address</i></td> <td> <input type="text" name="email" placeholder="Email" />*</td></tr>
                    <tr><td colspan="2"><?php echo recaptcha_get_html($publickey); ?></td></tr>	
                </table>
                <div id="buttons" >
                    <div id="register-domain" class="button">
                        <input  type="submit" name="confirm" value="Confirm" class="button" style="background-color: #60c8d8 "/>
                    </div>
                </div>
            </div>
<?php } ?>
    </form>

</div>
