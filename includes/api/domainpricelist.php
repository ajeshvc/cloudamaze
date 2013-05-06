

<?php
//include '../lib/resellerclubtld.php';
//include 'helloinfinitycallapi.php';


    //fetch tld's details is in offer table
    
    $offerdomainnamearray=array("");
    $offerdomainoriginalpricearray=array("");
    $offerdomainofferpricearray=array("");
    $sql = "select * FROM domain_offer ";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_array($result);
    
    while ($row != NULL) {
        array_push($offerdomainnamearray,$row['domain_name'] );
//        array_push($offerdomainoriginalpricearray,$row['original_price'] );
//        array_push($offerdomainofferpricearray,$row['offer_price'] );
        } 

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

   
if (in_array($value, $offerdomainnamearray)) {
    $position = array_search($value, $offerdomainnamearray);
    $domainprice=$offerdomainofferpricearray[$position];
}else{
    

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
    
} 
    
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
