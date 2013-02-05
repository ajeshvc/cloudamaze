<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cloudamaze.com | get amazed!</title>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
      
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/lightboxstyle.css" media="screen" />
    
   	    <script type="text/javascript">
$(document).ready(function() {
$('.error').hide(); //Hide error messages
$('#MainResult').hide(); //we will hide this right now
$('#form-wapper').hide(); //hiden main form
$("button").click(function() { //User clicks on Submit button

// Fetch data from input fields.
var js_name = $("#name").val();


// Do a simple validation
if(js_name==""){
    $("#nameLb .error").show(); // If Field is empty, we'll just show error text inside <span> tag.
return false;}

return true;
});

//If user wants to send another mail, send him back to form.
$("#gobacknow").live("click", function() {
$("#MainResult").hide(); //show Result
$("#MainContent").slideDown("slow"); //hide form div slowly

//clear all fields to empty state
$("#name").val('');
});

$("#OpenContact").live("click", function() {
$("#form-wapper").toggle("slow");

});
});
</script>

<script type="text/javascript">
function setFocus()
{
document.getElementById("name").focus();
}
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
