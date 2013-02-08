<?php 
 session_start();
if(isset($_POST['name']) and $_POST['name']!=""){
   
    $_SESSION['domain']=$_POST['name'];
    echo $_SESSION['domain'];
   header( 'Location: index.php?page=2' ) ;   
 }
 ?>
<div id="content">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    Etiam mattis iaculis scelerisque. Nunc porta augue in
    elit dignissim sed condimentum mi placerat. Morbi eu
    augue at tortor imperdiet hendrerit ac at metus. Sed
    
    </br>
    </br>
    </br>
    <div style="width: 45%;height: 45%">
    <div id="form-wapper">
            <div id="MainContent">
                <fieldset >
                        <legend>Domain Info</legend>
                        <form id="MyContactForm" name="MyContactForm" method="post" action="index.php?page=1" onsubmit="checkDomain()">
                            <label for="name" id="nameLb">Domain Name </label>
                            <input type="text" name="name" id="txt_domain" placeholder="Domain Name" />
                            <input type="submit" name="submit" value="Submit" >
                           
                        </form>
                       
                    </fieldset>
                     
                    
                </div>
              
        </div>
    </div>  
   
 <div id="buttons">
        <div id="skip-domain" class="button">
            <div id="popup" ><a href="#" id="OpenContact"> Continue </a></div>
            <img src="images/blue-botton.png" class="adjusted"/>
        </div>
        <div id="register-domain" class="button">
            <a href="http://domain.cloudamaze.com/" target="_blank"> Register domain </a>
            <img src="images/blue-botton.png" class="adjusted"/>
        </div>
    </div>
</div>
