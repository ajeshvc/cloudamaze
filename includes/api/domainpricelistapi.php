<?php
//include '../includes/lib/resellerclubtld.php';
include 'helloinfinitycallapi.php';
include 'domainprice.php';

$tldmostarray=array('net','in','biz','org','us','eu','co.uk','co.in','info','mobi');
  
   $tldmorearray=array('asia','name','tel','tv','me','ws','bz',
                                         'cc','org.uk','me.uk','net.in','org.in','ind.in','firm.in',
                                         'gen.in','mn','us.com','eu.com','uk.com','uk.net','gb.com',
                                         'gb.net','de.com','cn.com','qc.com','kr.com','ae.org','br.com',
                                         'hu.com','jpn.com','no.com','ru.com','sa.com','se.com','se.net',
                                         'uy.com','za.com','co','gr.com','co.nz','net.nz','org.nz','com.co',
                                         'net.co','nom.co','ca','de','es','xxx','ru','com.ru','net.ru',
                                         'org.ru','pro','nl','sx','cn','com.cn','net.cn','org.cn','com.de');
   
?>
<table>
    <?php 
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
  <?php   } ?>
    
    
     <?php    foreach ($tldmorearray as $tld) { 
        $domainname="test.".$tld;
        $domainprice=getdomainpriceapi($domainname);   ?>
    <tr>
        <th><?php echo $tld; ?></th><td align="left"> <font style="color: green" > &#8377; <?php echo " ".$domainprice; ?></font></td>   
    </tr>
  <?php   } ?>
    
    
    
</table>

