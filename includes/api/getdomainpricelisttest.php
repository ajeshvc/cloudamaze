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
$j=$i-3;
if($j<=count($resellersupporttld)){
for(;$j<=$i;$j++){
   
    $domainname="test.".$resellersupporttld[$j];
    $domainprice=getdomainpriceapi($domainname);
    sleep(1);
    ?><div>
    
        <div style="float:left"><?php echo $resellersupporttld[$j]; ?></div><div> <font style="color: green" > &#8377; <?php echo " ".$domainprice; ?></font></div> 
   </div>
<?php } }
 
?>