<?php
$colorid = 1;
$sql = "select *FROM domain_offer ";
$result = mysql_query($sql) or die(mysql_error()); 
while ($row = mysql_fetch_array($result)) {
?>

<div style="width: 100%;float: none;">
    <div class="hosting_content_outer">
       <div class="hosting_table_div" style="font-size: 20px;"> 
            <div style="float: none">
                <div class="hosting_row_div">      
                    <div class="first_hosting_col_div"  <?php if ($colorid % 2 == 0) { ?> id="even" <?php } else { ?> id="odd"<?php } ?> style="text-align: left; width: 20%" >
                        <div  style="float: left;width: 25%">
                            <span  class="dpricelist_name" style="margin-top: 10%">
                           <?php echo $row['domain_name']; ?>
                            
                            </span> 
                        </div>
                        <div style="float: left;width: 37%">:
                            <span class="dpricelist_price">
                            <strike>&#8377; <?php echo $row['original_price']; ?></strike>

                        </span>
                        </div>
                        <div style="float: left;width: 37%">
                           <span class="dpricelist_price">
                            &#8377; <?php echo $row['offer_price']; ?>

                        </span>
                        </div>
                        
                         </div>
                    

                </div> 
            </div>

        </div>

    </div>
</div>


<?php  $colorid++; } ?>



<?php
//include '../lib/resellerclubtld.php';
//include 'helloinfinitycallapi.php';

$comarray = array("com");
$resellersupporttld = array_merge($comarray, $tldmostarray, $tldmorearray);


$domarray = array("org", "biz", "us", "cno", "info");
$standardcomarray = array("us", "eu", "de", "qc", "kr", "gr");
$premiumcomarray = array("uk", "gb", "br", "hu", "jpn", "no", "ru", "sa", "se", "uy", "za");



$url = 'https://test.httpapi.com/api/products/customer-price.json?auth-userid=408467&api-key=8m1GgBU964O70VLpdQkDjMZDYbg9xX32';
$data = "";
$data = helloinfinityCallAPI('GET', $url, $data);
$datajson = json_decode($data, TRUE);



?>
<!--<html>
    <head>
         <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
    <body>
           -->
 <div style="text-align: left; margin-bottom: 10px;"> <a href="/domain-offer" class="btnclass"> View Offers  </a></div>
     
<div class="hosting_content_outer">
      <div class="hosting_table_div" style="font-size: 20px;"> 
        
        
<?php 
 $i = 0;
$colorid = 1;
foreach ($resellersupporttld as $value) {




    $domainname = "test." . $value;
    if ($domainname != "") {
        $selectedtld = $domainname;
        $count = substr_count($selectedtld, '.');
        if ($count == 1) {
            $split = explode(".", $selectedtld, 2);
            $selectedtld = $split[1];

            if (in_array($selectedtld, $domarray)) {
                $selectedtld = "dom" . $selectedtld;
            } elseif ($split[1] == "com") {
                $selectedtld = "domcno";
            } else {
                $selectedtld = "dot" . $selectedtld;
            }
        }
        if ($count == 2) {
            $split = explode(".", $selectedtld, 3);
            if ($split[2] == "com" || $split[2] == "net") {

                if (in_array($split[1], $standardcomarray)) {
                    $selectedtld = "centralnicstandard";
                } elseif (in_array($split[1], $premiumcomarray)) {
                    $selectedtld = "centralnicpremium";
                } else if ($split[1] == "cn" && $split[2] == "com") {
                    $selectedtld = "centralniccncom";
                }
            } else if ($split[2] == "de" && $split[1] == "com") {
                $selectedtld = "centralniccomde";
            } else if ($split[2] == "org" && $split[1] == "ae") {
                $selectedtld = "centralnicstandard";
            } else {
                $selectedtld = "thirdleveldot" . $split[2];
            }
        }
    } else {

        $selectedtld = "domcno";
        //default
    }

    $domainprice = $datajson[$selectedtld]["addnewdomain"][1];
    if ($domainprice == "") {
        $domainprice = "Not Available";
    } else {
        ?>
        <div style="float: none">
        <div class="hosting_row_div">      
            <div class="first_hosting_col_div"  <?php if ($colorid % 2 == 0) { ?> id="even" <?php } else { ?> id="odd"<?php } ?> style="text-align: left;" >
                    <span  class="dpricelist_name" >
                             <?php echo " ".$value; ?>
                             
                    </span>
                
                 <span class="dpricelist_price">
                             &#8377; <?php echo $domainprice ?>
                             
                    </span>
                             
                </div>

               
               
            </div> 
        </div>
        <?php 
       // echo $value . ": " . $domainprice . "<br/>";
            $colorid++;
            $i++;
    }
}


?>

  </div>
</div>  
<!--</body>
    </head>
</html>-->