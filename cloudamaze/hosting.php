<?php
$plans[] = "";
$planid[] = "";
$hostingprname[] = "";
$hostingprid[] = "";
$result = mysql_query(" select * from plans order by plan_id asc ");
$i = 0;
while ($row = mysql_fetch_array($result)) {
    $plans[$i] = $row['name'];
    $planid[$i] = $row['plan_id'];
    $i++;
}
?>
<div id="content">
    
<?php
$i = 0;
foreach ($planid as $value) {
   
    $result = mysql_query(" select hosting_properties.name,hosting_plans.value from  (hosting_properties inner join hosting_plans on hosting_plans.pr_id= hosting_properties.pr_id order by   hosting_properties.pr_id ) where hosting_plans.plan_id=$value");
    ?>
    <div style="float: left">
        <table border="2"> 
            <tr>
                <th colspan="2"><?php echo $plans[$i];?></th>
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
   }
    $i++;
    ?>
        </table>
        
    </div>
    <?php 
}
?>
    
    
    

</div>