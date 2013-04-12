<?php
include '../lib/resellerclubtld.php';
include 'helloinfinitycallapi.php';
include 'domainprice.php';

$comarray=array("com");
$resellersupporttld=array_merge($comarray,$tldmostarray,$tldmorearray);
if(!isset($_SESSION['count'])){
   $_SESSION['count']=0; 
}else{
    $_SESSION['count']++;
}
$i=$_SESSION['count'];
if($i<=count($resellersupporttld)){
   
    $domainname="test.".$resellersupporttld[$i];
    $domainprice=getdomainpriceapi($domainname);
    ?><table>
    <tr>
        <th><?php echo $resellersupporttld[$i]; ?></th><td align="left"> <font style="color: green" > &#8377; <?php echo " ".$domainprice; ?></font></td>   
    </tr></table>
 <?php }
 else {
     if(isset($_SESSION['count'])){
         unset($_SESSION['count']);
     }
 }
?>