<?php
$plans[] = "";
$planid[] = "";
$hostingdetails= "";

if(isset($_POST["email"]) and $_POST["email"]!="" and isset($_POST["confirm"]) and isset($_POST["hostingdetails"]) and $_POST["hostingdetails"] !="" ){
    $hostingdetails=$_POST["hostingdetails"];
    $currentdate=date("Y/m/d");
    session_start();
    $domain=$_SESSION['domain'];
   mysql_query("INSERT INTO hosting_details(date,domain,details) 
    VALUES('$currentdate','$domain','$hostingdetails') ");
   
   
$$to="siddique@helloinfinity.com";

$phone=$_POST["phone"];
$message = $hostingdetails;

$from = $_POST["email"];
$subject="New Hosting Request";
$headers ="From: "." ".$from." ".$phone;
$message=$message."\n\n\n"."\n".$phone;

$message = str_replace("|", "\n\n", $message);

if ($from!="" and  $phone!="" and $message!=""){
  mail($to,$subject,$message,$headers);  
 header('Location:index.php?page=3');
}
 
 
   
   
   
   
}

if(isset($_POST["choice"])){
    $planid[0]=$_POST["choice"];
    $result = mysql_query(" select * from plans  where plan_id=$planid[0] ");
}
 else {
    $result = mysql_query(" select * from plans order by plan_id asc ");
}

$i = 0;
while ($row = mysql_fetch_array($result)) {
    $plans[$i] = $row['name'];
    $planid[$i] = $row['plan_id'];
    $i++;
}
$i = 0;
?>
<div id="content">
  <form  name="form" method="post" action="index.php?page=2">   
     
<?php

foreach ($planid as $value) {
   
    $result = mysql_query(" select hosting_properties.name,hosting_plans.value from  (hosting_properties inner join hosting_plans on hosting_plans.pr_id= hosting_properties.pr_id order by   hosting_properties.pr_id ) where hosting_plans.plan_id=$value");
    ?>
    
    <div style="float: left">
        <table border="1"> 
            <tr>
                <th colspan="2"><?php echo $plans[$i]; if(isset($_POST["choice"])){ $hostingdetails.="|".$plans[$i];  }    ?></th>
            </tr>
            <tr>
                <td colspan="2"><hr/></td>
            </tr>
         <?php 
          while ($row = mysql_fetch_array($result)) {
         ?>   
        <tr>
            <th><?php echo $row['name']; ?></th>
            <td><?php echo $row['value']; ?></td>
        </tr>
        <?php   
        if(isset($_POST["choice"])){ $hostingdetails.="|".$row['name']."-".$row['value'];  } 
   }
    
    ?>
        </table>
        <?php 
        if(!isset($_POST["choice"])){ ?>
        <input type="radio" name="choice" onclick="this.form.submit();" value="<?php echo $planid[$i];?>" /><?php echo $plans[$i];?>
       <?php } ?>
        
    </div>
           
    <?php 
    $i++;
}


      
 if(isset($_POST["choice"])){
     ?>
     
      
        <textarea name="hostingdetails" hidden="hidden" >
          <?php 
              echo $hostingdetails;

?>
        </textarea>
      <br/>
      
       <input type="text" name="phone" placeholder="Phone" /> 
       <br/>
            <input type="text" name="email" placeholder="Your Email" />
           
      <div id="buttons" >
        <div id="register-domain" class="button">
            
            <input  type="submit" name="confirm" value="Confirm" class="button" style="background-color: #60c8d8 "/>
            
        </div>
    </div>
        
    </form>
    <?php 

 
 }
?>
   
 

</div>