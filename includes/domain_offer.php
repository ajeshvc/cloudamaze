
<?php
$colorid = 1;
$sql = "select *FROM domain_offer ";
$result = mysql_query($sql) or die(mysql_error()); 
while ($row = mysql_fetch_array($result)) {
?>

<div style="width: 100%;float: none;">
    <div class="hosting_content_outer">
       <div class="hosting_table_div" style="font-size: 22px;"> 
            <div style="float: none">
                <div class="hosting_row_div">      
                    <div class="first_hosting_col_div"  <?php if ($colorid % 2 == 0) { ?> id="even" <?php } else { ?> id="odd"<?php } ?> style="text-align: left; width: 20%" >
                        <div  style="float: left;width: 25%">
                            <span  class="dpricelist_name" style="margin-top: 10%">
                           <?php echo $row['domain_name']; ?>
                            
                            </span> 
                        </div>
                        <div style="float: left;width: 37%">:
                            <span class="dpricelist_price">
                            <strike>&#8377; <?php echo $row['original_price']; ?></strike>

                        </span>
                        </div>
                        <div style="float: left;width: 37%">
                           <span class="dpricelist_price">
                            &#8377; <?php echo $row['offer_price']; ?>

                        </span>
                        </div>
                        
                         </div>
                    

                </div> 
            </div>

        </div>

    </div>
</div>


<?php  $colorid++; } ?>

