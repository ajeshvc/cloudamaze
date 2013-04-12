<?php
include '../lib/resellerclubtld.php';
include 'helloinfinitycallapi.php';
include 'domainprice.php';
$i=$_GET['id'];
$comarray=array("com");
$resellersupporttld=array_merge($comarray,$tldmostarray,$tldmorearray);
//if(!isset($_SESSION['count'])){
//   $_SESSION['count']=0; 
//}else{
//    $_SESSION['count']++;
//}
//$i=$_SESSION['count'];
//echo $i;
//echo count($resellersupporttld);
if($i<=count($resellersupporttld)){
   
    $domainname="test.".$resellersupporttld[$i];
    $domainprice=getdomainpriceapi($domainname);
    ?><div>
    
        <div style="float:left"><?php echo $resellersupporttld[$i]; ?></div><div> <font style="color: green" > &#8377; <?php echo " ".$domainprice; ?></font></div> 
   </div>
 <?php }
 
?>