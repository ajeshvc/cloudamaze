<div id="content">

<div style="width:100%;height:auto;">
<?php 
$sql = "select * from  testimonial";
$result = mysql_query($sql) or die(mysql_error());
?><?php
while ($row = mysql_fetch_array($result)) {
     if($row['status']==1){
         ?>
    <div style="width: 70%"/>
        <blockquote class="testimonial">
  <p> <u><?php echo $row['subject']; ?></u> <br/>
<i> <?php echo $row['testimonial']; ?> </i></p>
</blockquote>
<div class="arrow-down"></div>
<p class="testimonial-author"><?php echo "<b>".$row['name']."</b>"; ?> | <span> <?php echo $row['company_name']; ?></span></p>
                
</div>        
  <?php }
 }
 ?>
    
<?php ?>
       
</div>   
  
    <div id="buttons">
        <div id="skip-domain">
            <a href="index.php" class="btnclass"> Home </a>
        </div>
    </div>
</div>
