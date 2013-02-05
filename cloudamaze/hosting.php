<?php
$plans[] = "";
$planid[] = "";
$hostingdetails= "";
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
echo $hostingdetails;
 session_start();
 echo $_SESSION['domain'];
 }
?>
    </form>  
 

</div>