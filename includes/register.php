<?php
$isdomainavailable = "NOT SET";
if ($flag) {
    $isdomainavailable = "YES";
} else {
    $isdomainavailable = "NO";
}
if (isset($_POST['check']) && $_POST['check'] == "Submit") {
    if (isset($_POST['domain']) && $_POST['domain'] != "") {
        $domain = $_POST['domain'];
        //validate domain
        if (preg_match("/^($label)\\.($tld)$/", $domain, $match) && in_array($match[2], $tld_list)) {
            $_SESSION['domain'] = $domain;
            header('Location: index.php?page=2');
        }
    }
} elseif (isset($_POST['domainradio']) && $_POST['domainradio'] != "") {
    $domainname = $_POST['domainradio'];
    $domainprice=  getdomainpriceapi($domainname);
    $_SESSION['domainprice']=$domainprice;
}
?>
<div id="content" >
   
        <form name="f1" method="post" <?php if (isset($_GET['skip']) && $_GET['skip'] == 'true') { ?> action="index.php?page=1&skip=true"  <?php } else { ?> action="index.php?page=1&skip=false"<?php } ?>>
         <div id="content1" style="float: left">   
            <div class="search_outer">
                <div class="search_container"> 
                
                	<div class="w3_container">
                            <div class="domail_text_wrapper">
                                www.
                            </div>                            
                    </div>
                        
                            
                    <div class="search_box_container">
                        <div id = "search_style">
                            <input type="text" name="domain" placeholder="" value="<?php echo $domainname; ?>" id="txt_domain" <?php if ((isset($_GET['check']) && $_GET['check'] == 'Submit') || ( isset($_POST['domainradio']) && $_POST['domainradio'] != "")) { ?> readonly="readonly" <?php } ?> />
                        </div>
                    </div>
                 <?php if (( isset($_GET['skip']) && $_GET['skip'] == 'false' ) && (!isset($_POST['domainradio']) )) { ?>
                        <div class="domain_container">
                            <div class="domail_text_wrapper" id="selectedtld">
                                .com
                            </div>
                            <div class="arrow_wrapper">
                                <a style="text-decoration: none;" href="javascript:eToggle('atag','helptxt');" 
                                   id="atag">&#9660</a>
                            </div>
                        </div>
                    <?php } ?>
                    <input type="submit" id="search_btn_container" class="btnclass" name="check" <?php if (( isset($_GET['skip']) && $_GET['skip'] == 'true' ) || ( isset($_POST['domainradio']) && $_POST['domainradio'] != "")) { ?> value="Submit"  <?php } else { ?> value="Check" <?php } ?>  />        
                </div>
            </div>
             
             
              <?php if ((isset($_GET['check']) && $_GET['check'] == 'Submit') || ( isset($_POST['domainradio']) && $_POST['domainradio'] != "")) { 
                
        ?><font style="color: green" > &#8377; <?php echo " ".$domainprice; ?></font> 
              <?php  } ?>
            <!--<table>-->
                <?php if (( isset($_GET['skip']) && $_GET['skip'] == 'false' ) && (!isset($_POST['domainradio']))) { ?>
                    <div id="helptxt" style="display: none">     
                        <div class="hidden_container">
                            <div class="domain_div_arrow"></div>
                            <div class="checkbox_container">
                                 <br/>
                               Most Popular Domain Extensions:
                               <br/>
                                <br/>
                               <?php  //$tldmostarray is in lib/resellerclubtld.php ?>
                                <input type="checkbox" name="tld[]" value="com"  <?php if (!isset($_POST['check'])  ) { ?> checked="checked" <?php } elseif (in_array("com", $tldarray)  ) { ?> checked="checked" <?php } ?> onchange="selectCheckBox()" />com 
                              <?php  $i=1;         
                            foreach ($tldmostarray as $value) {
                                   if($i%7==0){?><br/><?php   } ?>
                                 <input type="checkbox" name="tld[]" value="<?php echo $value; ?>" <?php if (in_array($value, $tldarray)) { ?> checked="checked" <?php } ?> onchange="selectCheckBox()" /><?php echo $value; ?>
                                 <?php  if($i%7==0){   $i=0; } 
                                    $i++; } ?>
                                <div class="arrow_wrapper">
                                    <a style="text-decoration: none;" href="javascript:moredomainToggle('moretag','domaintxt','content1');" 
                                       id="moretag"  class="link_more">More>></a>
                                </div>
                            </div>
                        </div>
                    </div>


        <div class="banner_outer" style="min-width: 0%">
            <table>
                    <?php
                    // to display given Domain Available or Not
                    if ($status != "" && $exist) {
                        ?>

                        <tr><td id="tdheadNot"> Domain Already Exist :</td></tr> <?php
                        foreach ($tldarray as $arrayitem) {
                            $fulldomainname = $domainname . "." . $arrayitem;
                            if ($datajson[$fulldomainname]["status"] != "available") {
                                ?> <tr><td align="left"><?php echo $fulldomainname; ?> </td></tr>  
                                <?php
                            }
                        }
                        ?> 
                    <?php
                    }
                    // to activate radio button to select Available Domains
                    if ($flag) {
                        ?> <tr><td id="tdhead">  Available Domains : </td></tr>
                        <?php
                        foreach ($tldarray as $arrayitem) {

                            $fulldomainname = $domainname . "." . $arrayitem;

                            if ($datajson[$fulldomainname]["status"] == "available") {
                                $domainprice=getdomainpriceapi($fulldomainname);
                                ?> <tr><td align="left"><input type="radio" value="<?php echo $fulldomainname; ?>" name="domainradio" onclick="this.form.submit();" /> <?php echo $fulldomainname; ?></td><td align="left"> <font style="color: green" > &#8377; <?php echo " ".$domainprice; ?></font></td></tr> 
                                <?php
                            }
                        }
                    } else {
                        if ($status != "") {
                            ?> <tr><td id="tdhead"><?php echo 'Suggested Domains:'; ?> </td></tr>
                            <?php foreach ($domainsuggestionsarray as $value) {
                                 $domainprice=getdomainpriceapi($value);
                                ?> <tr><td align="left"><input type="radio" value="<?php echo $value; ?>" name="domainradio" onclick="this.form.submit();" /><?php echo $value; ?></td><td align="left"> <font style="color: green" > &#8377; <?php echo " ".$domainprice; ?></font> </td></tr>
                                <?php
                            }
                        }
                    }
                    ?> </table> </div> <?php
                }
                ?>
            <!--</table>--> 
            


             
             
</div>
    <!--            Domain more div-->
    <div id="domaintxt" style="display: none">     
        <div class="hidden_container">
           
<!--            <div class="trans_bg">-->
<div class="trans_content_outer">
                    <div class="trans_content">
                        <div class="cust_table_div">
                            Other Domain Extensions: 
                            <?php 
                           //$tldmorearray is in resellerclubtld.php
                            $i=8;         
                            foreach ($tldmorearray as $value) {
                                   if($i%8==0){?><div class="cust_row_div"><?php  } ?>
                                   <div class="cust_col_div">
                                       <input type="checkbox" name="tld[]" value="<?php echo $value; ?>" <?php if (in_array($value, $tldarray)) { ?> checked="checked" <?php } ?> onchange="selectCheckBox()" /><?php echo $value; ?>
                                 </div>
                                    <?php  if($i%8==0){?></div><?php $i=0; } 
                                    $i++; } ?>
                           
                          </div> 
                        <div class="trans_button_container">
                            <div class="arrow_wrapper" style="padding: 5%">
                                <a style="text-decoration: none;" href="javascript:moredomainToggle('moretag','domaintxt','content1');" 
                                   id="moretag"  class="btnclass">OK</a>
                            </div>

                        </div>
                    </div>
                </div>
<!--            </div>-->
        </div>
    </div>
    <!--end domain more div-->

   </form>  
            
			<!-- Link team images-->
           <?php  if (!isset($domainprice) || (isset($domainprice)&& $domainprice=="")){?> 
            <div id="link_team_thumbs">
                <a id="link_team_capanel" href="http://capanel.cloudamaze.com"><img src="images/capanel.png" alt=""/></a>
                <a id="link_team_webftp" href="http://webftp.cloudamaze.com"><img src="images/wftp.png" alt=""/></a>
                <a id="link_team_camail" href="http://mail.cloudamaze.com"><img src="images/camail.png" alt=""/></a>
                <a id="link_team_phpadmin" href="http://db.cloudamaze.com"><img src="images/pmadmin.png" alt=""/></a>
                <span class="link_team_stretch"></span>
            </div>
           <?php } ?>
</div>
            
            
            
     






