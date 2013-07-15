<?php
require_once 'config.php';
require_once 'includes/content_selector_page_name.php';
session_start();
if ($DEBUG) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <link rel="icon"  href="images/ca.ico"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="description" content="india's first 99.95% uptime cloud hosting service. foss cloud hosting service with isp config">
            <meta name="keywords" content="cloud hosting india,cloud hosting service,web mail,email hosting,corporate email,cloud mail server,cloud server ,indian host">
                <title>Cloudamaze | High uptime cheap cloud hosting in india</title>
            <link rel="stylesheet" href="css/style.css" type="text/css"/>
            <link rel="stylesheet" href="css/badgestyle.css" type="text/css"/>
            <script type="text/javascript" src="js/badgeaction.js"></script>
            <script type="text/javascript" src="js/jquery.min.js"></script>
             <script type="text/javascript" src="js/toggletld.js"></script>
            <link rel="stylesheet" type="text/css" href="css/formstyle.css" />
            <!--Start of Zopim Live Chat Script-->
            <script type="text/javascript">
                window.$zopim || (function(d, s) {
                    var z = $zopim = function(c) {
                        z._.push(c)
                    }, $ = z.s =
                            d.createElement(s), e = d.getElementsByTagName(s)[0];
                    z.set = function(o) {
                        z.set.
                                _.push(o)
                    };
                    z._ = [];
                    z.set._ = [];
                    $.async = !0;
                    $.setAttribute('charset', 'utf-8');
                    $.src = '//cdn.zopim.com/?11NPAUG217M9Wj16bmrhVhBPnZRHBzEX';
                    z.t = +new Date;
                    $.
                            type = 'text/javascript';
                    e.parentNode.insertBefore($, e)
                })(document, 'script');
            </script>
            <!--End of Zopim Live Chat Script-->
            <!-- Track Code -->
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                ga('create', 'UA-5307819-37', 'cloudamaze.com');
                ga('send', 'pageview');
            </script>
    </head>
    <body <?php if (isset($page) &&  $page==1){ ?> onLoad="document.f1.domain.focus()" <?php } ?> >
        <div id="container">
            <?php require 'includes/header.php'; ?>
            <div id="outer-content">
                <?php require 'includes/menu.php'; ?>
                <div id="inner-content">
                    <?php  require 'includes/content_selecter.php'; ?>                      
                </div>                  
            </div>    
            <?php
            if ((isset($page) && $page == 1) || !isset($page)) {
                include 'includes/footer.php';
            }
            ?>                            
            <img src="images/side-bar.png" id="side-bar"/>              
        </div>          
    </body>
</html>
