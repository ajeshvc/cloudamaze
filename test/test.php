<?php
include '../includes/lib/resellerclubtld.php';
$domarray=array("org","biz","us","cno","info");
$standardcomarray=array("us","eu","de","qc","kr","ae","gr");
$premiumcomarray=array("uk","gb","br","hu","jpn","no","ru","sa","se","uy","za");
  //$split=explode(".", "siddique.org", 2);
  // $selectedtld=$split[1];
  if(isset($_POST['tld'])){
     $selectedtld="siddique.".$_POST['tld']; 
     $count=substr_count($selectedtld, '.');
     echo $count;
     if($count==1){
     $split=explode(".", $selectedtld, 2);
     $selectedtld=$split[1];
     
     if (in_array($selectedtld, $domarray)) {
       $selectedtld="dom".$selectedtld;  
    }  else {
         $selectedtld="dot".$selectedtld;
}
     
     
     }
     if($count==2){
        $split=explode(".", $selectedtld, 3);
        if($split[2]=="com"||$split[2]=="net"){
            
      if (in_array($split[1], $standardcomarray)) {
       $selectedtld="centralnicstandard";  
    }elseif(in_array($split[1], $premiumcomarray)){
        $selectedtld="centralnicpremium";
    }
            
        else if($split[1]=="cn" && $split[2]=="com" ){ 
           $selectedtld="centralniccncom";
        }     
        }  else if($split[2]=="de" && $split[1]=="com" ){ 
           $selectedtld="centralniccomde";
        }
       
            else{
             $selectedtld="thirdleveldot".$split[2]; 
        }
    
     
     }
     
     
     
     
     
  }
 else {
     $split=explode(".", "siddique.org", 2);
     $selectedtld=$split[1];
}


 
    
  
function helloinfinityCallAPI($method, $url, $data = false) {
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



    $url = 'https://test.httpapi.com/api/products/customer-price.json?auth-userid=408467&api-key=8m1GgBU964O70VLpdQkDjMZDYbg9xX32';
    $data = "";
    $data = helloinfinityCallAPI('GET', $url, $data);
    $datajson = json_decode($data, TRUE);
    //print_r($datajson);
   // $selectedtld="us";
   
   
    echo $selectedtld." : ";
    echo $datajson[$selectedtld]["addnewdomain"][1]." INR";
                                
   ?>
<form action="test.php" method="post">
  
   <?php  
                            
foreach ($tldmostarray as $value) { ?>
<input type="radio" name="tld" value="<?php echo $value; ?>"  onclick="this.form.submit()" /><?php echo $value; ?>
                                        
 <?php echo " "; } 
 foreach ($tldmorearray as $value) { ?>
<input type="radio" name="tld" value="<?php echo $value; ?>"  onclick="this.form.submit()"  /><?php echo $value; ?>
                                      
 <?php echo " "; } ?>

    
</form>