<?php
if (isset($_POST['vpsradio']) && $_POST['vpsradio'] != "") {
    $_SESSION['planchoice'] = $_POST['vpsradio'];
}

if (isset($_POST["confirm"])) {
    $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
    if (!$resp->is_valid) {
        // What happens when the CAPTCHA was entered incorrectly
        $captchaflag = 1;
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
            if (isset($_POST['confirm']) && $_POST['confirm'] == "Confirm") {
                if (isset($_POST['hostingname']) && $_POST['hostingname'] != "") {
                    $hostingname = $_POST['hostingname'];
                    //validate domain
                    if (preg_match("/^($label)\\.($tld)$/", $hostingname, $match) && in_array($match[2], $tld_list)) {
                        $vpsdetails = "";
                        $total = 0;
                        $extraip = $_POST['extraip'];
                        if ($extraip) {
                            $total = $extraip * 1.5;
                            $extraip = "Extra IP : " . $extraip . " $" . $extraip * 1.5 . " USD";
                        } else {
                            $extraip = "Extra IP : None";
                        }
                        switch ($_SESSION['planchoice']) {
                            case 1:
                                $vpsdetails = "choice 1 ";
                                $total+=100;
                                break;
                            case 2:
                                $vpsdetails = "choice 2 ";
                                $total+=200;
                                break;
                            case 3:
                                $vpsdetails = "choice 3 ";
                                $total+=300;
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
                        $total*=$rate;
                        
                        
                          $vpsdetails.=$extraip."Total : ".$total;
                          $vpsdetailstodb=$vpsdetails;


                          // insert into db
                          $currentdate = date("Y/m/d");
                          mysql_query("INSERT INTO vps_details(date,host_name,details)
                          VALUES('$currentdate','$hostingname','$vpsdetailstodb') ");
                          $id=mysql_insert_id();
                          $invoice = "#hivps00". $id;
                          /*
                          //mail
                          $vpsdetailstomail=$vpsdetails;
                          $_SESSION['total']=$total;
                          $_SESSION['invoice'] = $invoice;
                          $_SESSION['domain'] = $hostingname;
                          unset($_SESSION['planchoice']);
                          header('Location:index.php?page=4');
                         */
                    }
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
