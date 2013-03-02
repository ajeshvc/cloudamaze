<?php
if (!isset($_SESSION['domain'])) {
    header('Location: index.php?page=1');
}

function check_email_address($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
            return false;
        }
    }
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) {
        // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false;
            // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                return false;
            }
        }
    }

    return true;
}

$plans[] = "";
$planid[] = "";
$hostingdetails = "";
$captchaflag = 0;
if (isset($_POST["confirm"])) {

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

    if (isset($_POST["email"]) and $_POST["email"] != "" and $captchaflag == 1) {
        $phone = $_POST["phone"];
        $name = $_POST["name"];
        if (check_email_address($_POST["email"]) == TRUE and $phone != "" and $name != "") {

            if (isset($_POST["hostingdetails"]) and $_POST["hostingdetails"] != "") {
                $hostingdetails = $_POST["hostingdetails"];
                $currentdate = date("Y/m/d");

                $domain = $_SESSION['domain'];
                $hostingdetailstodb = "|" . $name . "|" . $phone . "|" . $_POST["email"] . $hostingdetails;
                $hostingdetailstodb = str_replace("+", "", $hostingdetailstodb);
                mysql_query("INSERT INTO hosting_details(date,domain,details) 
                         VALUES('$currentdate','$domain','$hostingdetailstodb') ");

                $invoice = "#hi00" . mysql_insert_id();
                $_SESSION['invoice'] = $invoice;
                $from = $_POST["email"];
                $to = $to_email;

                if ($from != "" and $phone != "" and $hostingdetails != "") {


                    $message = "|Hosting Details of - " . $domain . "|Invoice Id " . $invoice . $hostingdetails;
                    $subject = $name . "- New Hosting Request";
                    $message = $message . "\n\n" . "-------------------\n" . $name . "\n" . $phone . "\n" . $_POST["email"] . "\n" . "on-" . $currentdate;
                    $message = str_replace("|", "\n\n", $message);
                    $message = str_replace("+", "", $message);
                    $headers = "From: " . $name . " " . $from;
                    mail($to, $subject, $message, $headers);
                    sleep(5);
                    include_once "includes/swift/lib/swift_required.php";
                    $from = array($_POST["email"] => $name);
                    $to = $to_mandril_email;

                    $message = "Hello " . $name . ",
                            ||  This is a notice that an invoice has been generated on " . $currentdate . "
                            ||<b>Invoice Id </i>" . $invoice . "</i></b>
                            
                            ||<b>Details of Hosting Package you Purchased for your Domain Name - " . $domain . "</b>|" . $hostingdetails . "</b> 
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
                            |" . "<br>-----------------------------------------------<br/><b>Cloudamaze - </b><i>get amazed</i>";
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



                    header('Location:index.php?page=4');
                }
            }
        }
    }
}
if (isset($_POST["choice"])) {
    $planid[0] = $_POST["choice"];
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
?>
<div id="content" style="alignment-adjust: central; ">
   
    <form  name="form" method="post" action="index.php?page=2">   
        <div style="float: left;text-align: left;width: 5%">&nbsp;</div>
<?php
foreach ($planid as $value) {
    ?>

            <div style="float: left;" >
                <table border="0"> 
                    <tr bgcolor="#9dc33c">
                        <th colspan="2"><?php
    echo $plans[$i];
    if (isset($_POST["choice"])) {
        $hostingdetails.="|" . $plans[$i];
    }
    ?></th>
                    </tr>
                    <tr bgcolor="#747474">
                        <td colspan="2"><hr/></td>
                    </tr>
                            <?php
                            $result = mysql_query(" 
     
     SELECT hosting_properties.name, hosting_plans.value,hosting_properties.pr_id
FROM hosting_properties
INNER JOIN hosting_plans ON hosting_plans.pr_id = hosting_properties.pr_id
WHERE hosting_plans.plan_id =$value
ORDER BY hosting_properties.pr_id 
     
     ");
                            //#61c8d9 #9dc33c
                            $colorid = 1;
                            while ($row = mysql_fetch_array($result)) {
                                ?>   
                        <tr bgcolor="<?php
                        if ($colorid % 2 == 0) {
                            echo '#FFFFFF';
                        } else {
                            echo '#FFFFFF';
                        }
                        ?>" >
                            <th><?php echo $row['name']; ?></th>
                            <td><?php echo $row['value']; ?></td>
                        </tr>
        <?php
        if (isset($_POST["choice"])) {
            $hostingdetails.="|" . $row['name'] . "-" . $row['value'];
            if ($row['pr_id'] == '11') {
                $peryear = $row['value'] * 12;
                $hostingdetails.="||+Total RS :" . $peryear . ".00 INR Only .";
                $_SESSION['total'] = $peryear;
            }
        }
        $colorid++;
    }
    ?>
                </table>
                    <?php if (!isset($_POST["choice"])) { ?>
                    <input type="radio" name="choice" onclick="this.form.submit();" value="<?php echo $planid[$i]; ?>" /><?php echo $plans[$i]; ?>
                <?php } ?>

            </div>

    <?php
    $i++;
}



if (isset($_POST["choice"])) {
    ?>


            <textarea name="hostingdetails" hidden="hidden" hidden  readonly="readonly">
    <?php
    echo $hostingdetails;
    ?>
            </textarea>
           
            <div align="center" >
                <h3> <?php echo $more; ?></h3>
                <h4><i>Drop in your Name,Phone number,Email and hit Confirm</i></h4>
                <table border="0">
                    <tr><td><i>Full Name </i></td> <td><input type="text" name="name" placeholder="Your Name" /></td></tr>
                    <tr><td><i>Phone Number</i></td> <td><input type="text" name="phone" placeholder="Phone" /> </td></tr>
                    <tr><td><i>Email Address</i></td> <td> <input type="text" name="email" placeholder="Email" /> </td></tr>
                    <tr><td colspan="2"><?php echo recaptcha_get_html($publickey); ?></td></tr>	


                </table>
                 <div id="buttons" >
                <div id="register-domain" class="button">
                    <input  type="submit" name="confirm" value="Confirm" class="button" style="background-color: #60c8d8 "/>
                </div>
            </div>
            </div>
         
        </form>
    <?php
}
?>
</div>
