<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <?php
    require_once 'config.php';
    session_start();
    if ($DEBUG) {
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    }
    ?>
    <html>
        <head>
             <link rel="icon"  href="images/ca.ico"/>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title>Cloudamaze.com | get amazed!</title>
                <link rel="stylesheet" href="css/style.css" type="text/css"/>
                <script type="text/javascript" src="js/jquery.min.js"></script>
                <link rel="stylesheet" type="text/css" href="css/lightboxstyle.css" media="screen" />
                <!--Start of Zopim Live Chat Script-->
                    <script type="text/javascript">
                    window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
                    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
                    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
                    $.src='//cdn.zopim.com/?11NPAUG217M9Wj16bmrhVhBPnZRHBzEX';z.t=+new Date;$.
                    type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
                    </script>
                <!--End of Zopim Live Chat Script-->
        </head>
        <body>
          <div id="container">
              <?php require 'includes/header.php'; ?>
              <div id="outer-content">
                  <?php require 'includes/menu.php'; ?>
                  <div id="inner-content">
                      <?php require 'includes/content_selecter.php'; ?>                      
                  </div>                  
              </div>    
              <?php if ((isset($_GET['page']) && $_GET['page']==0) || !isset($_GET['page'])) { include 'includes/footer.php'; } ?>                            
              <img src="images/side-bar.png" id="side-bar"/>              
          </div>          
        </body>
    </html>