<?php
include '../../config.php';

//Code By : HelloInfinity
//Date : March 6 2013
//Function to Call API Calls
// Method: GET,POST, PUT
// Data: array("param" => "value") ==> sample.php?param=value

//include api/helloinfinitycallapi.php
//Example Call to see available domains and suggestions
$url = '';
$tldarray[] = "";
$domainname="";
//$domainstatusarray=array("");
$domainsuggestionsarray[]="";
$flag=0;
$status="";
$exist=false;
$limit=7;
if (isset($_GET['skip']) && $_GET['skip']=='false' ){
if (isset($_POST['check']) && isset($_POST['domain']) && $_POST['domain'] != "" && isset($_POST['tld']) && $_POST['tld'] != "") {

    $domainname = $_POST['domain'];
    $tld = "";
    $i = 0;
    foreach ($_POST['tld'] as $arrayitem) {
        $tld.='&tlds=' . $arrayitem;
        $tldarray[$i] = $arrayitem;
        $i++;
    }

// $api_user_id and  $api_key are initialized in config file
    $url = 'https://test.httpapi.com/api/domains/available.json?auth-userid=' . $api_user_id . '&api-key=' . $api_key . '&domain-name=' . $domainname . $tld . '&suggest-alternative=true';
    $data = "";
    $data = helloInfinityCallAPI('GET', $url, $data);
    $datajson = json_decode($data, TRUE);
    $fulldomainname = "";
    //$flag=0;
   // $j=0;
   
    foreach ($tldarray as $arrayitem) {

        $fulldomainname = $domainname . "." . $arrayitem;
       // echo '<br/>' . $fulldomainname;
        if ($datajson[$fulldomainname]["status"] == "available") {
            $status="Available";
          $flag=1;
        } else {
             $status="Not Available";
             $exist=true;
             
        }
      
    }
   
    // Domain Suggestions
    $stack=array("");
    $i = 0;
    
    foreach ($datajson[$domainname] as $sugdomain => $sugtld) {
        $stack[$i] = $sugdomain;
        $i++;
    }

   // echo '<br/>Sugg names : <br/>';
    $i = 0;
    foreach ($stack as $value) {
        if (!empty($datajson[$domainname][$value])){
        foreach ($datajson[$domainname][$value] as $sugdomain => $sugtld) {
            if ($datajson[$domainname][$value][$sugdomain] == "available") {
               // echo $value . '.' . $sugdomain;
                
                // check one more times is sugested domain is already exist or not 
                $url = 'https://test.httpapi.com/api/domains/available.json?auth-userid=' . $api_user_id . '&api-key=' . $api_key . '&domain-name=' . $value . '&tlds=' .$sugdomain. '&suggest-alternative=false';
                $data = "";
                $data = helloInfinityCallAPI('GET', $url, $data);
                $datasugjson = json_decode($data, TRUE);
               // print_r($datasugjson);
                $fulldomainname = $value . "." . $sugdomain;
               // echo $fulldomainname . $datasugjson[$fulldomainname]["status"];
               if ($datasugjson[$fulldomainname]["status"] == "available") {
                    $domainsuggestionsarray[$i]=$value . '.' . $sugdomain;
                $i++;
               }
                
                
                if ($i == $limit) {

                    break;
                }
            }
        }

        if ($i == $limit) {

            break;
        }
    }
    }
    // domain suggestions end
}
 elseif (isset($_POST['check'])){
     
    if(!isset($_POST['tld'])){
      echo '<br/> Tick Your Domain'; 
      
    }
     if( !isset($_POST['domain']) || $_POST['domain'] =="" ){
        echo '<br/> Type Domain Name';      
    }else{
        $domainname=$_POST['domain'];
    }
 
        
     
    
}
}else{
    //skip true
}
?>
