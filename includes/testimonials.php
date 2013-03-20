<div id="content">

<div style="width:100%;height:auto;">
<?php 
$sql = "select * from  testimonial";
$result = mysql_query($sql) or die(mysql_error());
?><table style="text-align: left" align="left" border="0" width="25%" cellspacing="10"><?php
while ($row = mysql_fetch_array($result)) {
     if($row['status']==1){
         ?>
    
        <tr>
            <td colspan="2">
                <?php echo "<b>".$row['name']."</b>"." From "."<b>". $row['company_name']."</b>"; ?>
           </td>
        </tr>
        <tr>
            <td width="20%" valign="left">
                  Subject  
            </td>
            <td>
              <b>  <?php echo $row['subject']; ?> </b>
            </td>
        </tr>
        <tr>
            <td colspan="2">
             <i>   <?php echo $row['testimonial']; ?> </i>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr/></td>
        </tr>
  <?php }
 }
 ?>
     </table>
<?php ?>
       
</div>   
  
    <div id="buttons">
        <div id="skip-domain">
            <a href="index.php" class="btnclass"> Home </a>
        </div>
    </div>
</div>
