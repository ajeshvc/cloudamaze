<?php
require_once('../config.php');
//$api_user_id = APP_USER_ID;
//$api_key = APP_USER_KEY;

$url = '';
$api_key_key = "";
$api_user = "";

$email = "";


if (isset($_POST['check'])) {

   
    $api_key_key = $_POST['api_key_key'];
    $api_user = $_POST['api_user'];

  $email = $_POST['email']; 


// $api_user_id and  $api_key are initialized in config file or directly in in this page
  $data = array("auth-userid"=>$api_user,"api-key"=>$api_key_key,"username"=>$email);
                                                                     
echo $data_string = json_encode($data);                                                                                   
 
$ch = curl_init('https://test.httpapi.com/api/customers/details.json?');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   

$result = curl_exec($ch);

   
if(!$result)
echo "sorry";
else {
echo "";
print_r($result);

}

}
?>
<!DOCTYPE HTML>
<!-- ### Template root.html starts here ### -->
<html dir="ltr">
    <head>
</head>
<body>

		
 	
  <form  method="post" name="signup" id="signup" action="<?php echo $_SERVER['PHP_SELF']?>" >
   
 <table class="frmTable rightAlignedForm">
    <input type="hidden" name="api_key_key" class="frm-field" value="<?php echo $api_key;?>" size="35">
       <input type="hidden" name="api_user"  class="frm-field" value="<?php echo $api_user_id?>" size="35">
      
                   <tr>
              <td class="frmField"><label id="label_newemail" for="username">Email<span class="asterix">*</span></label>
                <input type="text" name="email" id="username" class="frm-field" value="" size="35" >
               </td>
            </tr>
        
      <tr>
        <td class="frmCancel" colspan="2">
            <input name="check" type="submit" value="Check">
          </span></td>
      </tr>
    </table>
  </form>

</body>
</html>

<!-- ### Template root.html ends here ### -->
