<?php
//Code By :Sidhu
//Date : March 6 2013
//Function to Call API Calls
// Method: GET,POST, PUT
// Data: array("param" => "value") ==> sample.php?param=value


include '../config.php'; 
//$api_user_id="Your user id";
//$api_key="key";


function domainCallAPI($method, $url, $data = false) {
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication: - Need not touch this
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    return curl_exec($curl);
}
?>

<?php
//Example Call to see available domains and suggestions
$url = '';
$tldarray[] = "";
$domainname="";
if (isset($_POST['check']) && isset($_POST['domain']) && $_POST['domain'] != "" && isset($_POST['tld']) && $_POST['tld'] != "") {

    $domainname = $_POST['domain'];
    $tld = "";
    $i = 0;
    foreach ($_POST['tld'] as $arrayitem) {
        $tld.='&tlds=' . $arrayitem;
        $tldarray[$i] = $arrayitem;
        $i++;
    }

// $api_user_id and  $api_key are initialized in config file or directly in in this page
    $url = 'https://test.httpapi.com/api/domains/available.json?auth-userid=' . $api_user_id . '&api-key=' . $api_key . '&domain-name=' . $domainname . $tld . '&suggest-alternative=true';
    $data = "";
    $data = domainCallAPI('GET', $url, $data);
    $datajson = json_decode($data, TRUE);
    echo '<br/> '.$url.'<br/>';
    $fulldomainname = "";
    //  $flag=0;
    foreach ($tldarray as $arrayitem) {

        $fulldomainname = $domainname . "." . $arrayitem;
        echo '<br/>' . $fulldomainname;
        if ($datajson[$fulldomainname]["status"] == "available") {
            echo '    Available';
            // $flag=1;
        } else {
            echo '    Not Available <br/>';
        }
    }
    // Domain Suggestions
    $stack = array("");
    $i = 0;
    foreach ($datajson[$domainname] as $sugdomain => $sugtld) {
        // echo $sugdomain.'.'.$tld;

        $stack[$i] = $sugdomain;
        $i++;
    }
    echo '<br/>Sugg names : <br/>';
    $i = 0;
    foreach ($stack as $value) {
        foreach ($datajson[$domainname][$value] as $sugdomain => $sugtld) {
            if ($datajson[$domainname][$value][$sugdomain] == "available") {
                echo $value . '.' . $sugdomain;
                echo '<br/>';
                $i++;
                if ($i == 7) {

                    break;
                }
            }
        }

        if ($i == 7) {

            break;
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

?>

<form method="post" action="test.php">
    <input type="text" name="domain" value="<?php echo $domainname; ?>"/>
 
    <input type="checkbox" name="tld[]" value="com"  <?php  if(!isset($_POST['check'])){  ?> checked="checked" <?php } elseif (in_array("com", $tldarray)) {  ?> checked="checked" <?php  } ?> />com
    <input type="checkbox" name="tld[]" value="net" <?php if (in_array("net", $tldarray)) {  ?> checked="checked" <?php  } ?> />net
    <input type="checkbox" name="tld[]" value="in" <?php if (in_array("in", $tldarray)) {  ?> checked="checked" <?php  } ?> />in
    <input type="checkbox" name="tld[]" value="biz" <?php if (in_array("biz", $tldarray)) {  ?> checked="checked" <?php  } ?> />biz
    <input type="checkbox" name="tld[]" value="org" <?php if (in_array("org", $tldarray)) {  ?> checked="checked" <?php  } ?> />org
    <input type="checkbox" name="tld[]" value="asia" <?php if (in_array("asia", $tldarray)) {  ?> checked="checked" <?php  } ?> />asia


    <input type="submit" name="check" value="Check"/>
</form>
