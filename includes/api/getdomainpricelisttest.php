<?php
include '../lib/resellerclubtld.php';
include 'helloinfinitycallapi.php';
include 'domainprice.php';
$q=$_GET["id"]; 
?><table><?php 
if($q==1){
    
    $tld="com";
    $domainname="test.com";
    $domainprice=getdomainpriceapi($domainname);
    ?>
    <tr>
        <th><?php echo $tld; ?></th><td align="left"> <font style="color: green" > &#8377; <?php echo " ".$domainprice; ?></font></td>   
    </tr>
    
    <?php    foreach ($tldmostarray as $tld) { 
        $domainname="test.".$tld;
        $domainprice=getdomainpriceapi($domainname);   ?>
    <tr>
        <th><?php echo $tld; ?></th><td align="left"> <font style="color: green" > &#8377; <?php echo " ".$domainprice; ?></font></td>   
    </tr>
  <?php   } 
    
  
    
}
elseif($q==2){ 
    foreach ($tldmorearray as $tld) { 
        $domainname="test.".$tld;
        $domainprice=getdomainpriceapi($domainname);   ?>
    <tr>
        <th><?php echo $tld; ?></th><td align="left"> <font style="color: green" > &#8377; <?php echo " ".$domainprice; ?></font></td>   
    </tr>
  <?php   }
  }?>
</table>
