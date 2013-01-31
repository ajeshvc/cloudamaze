<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cloudamaze.com | get amazed!</title>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
    <script type="text/javascript">
    $(function() {
        $('#popup a').lightBox();
    });
    </script>
   	

    
    
    </head>
    <body>
        <div id="container">
            <?php include 'includes/header.php'; ?>
            <div id="outer-content">
                <?php include 'includes/menu.php'; ?>
                <div id="inner-content">
                    <?php include 'includes/content_selecter.php'; ?>
                </div>
            </div>
            <?php include 'includes/footer.php'; ?>
            <img src="images/side-bar.png" id="side-bar"/>
        </div>
    </body>
</html>
