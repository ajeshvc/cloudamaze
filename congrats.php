<?php

if(!isset($_SESSION['domain']) || !isset($_SESSION['invoice'])){
header( 'Location: index.php?page=1' ) ;
}
 

?>
<div id="content" >
   <table id="Table_01" width="1116" height="255" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="18">
			<img src="images/congrats/cloudamaze_psd_01.png" width="1115" height="4" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="4" alt=""></td>
	</tr>
	<tr>
		<td colspan="8">
			<img src="images/congrats/cloudamaze_psd_02.png" width="381" height="39" alt=""></td>
		<td colspan="3">You are awesome!</td>
		<td colspan="7">
			<img src="images/congrats/cloudamaze_psd_04.png" width="390" height="39" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="39" alt=""></td>
	</tr>
	<tr>
		<td rowspan="11">
			<img src="images/congrats/cloudamaze_psd_05.png" width="73" height="211" alt=""></td>
		<td rowspan="7">
			<img src="images/congrats/cloudamaze_psd_06.png" width="141" height="136" alt=""></td>
		<td colspan="3" rowspan="2">
			<img src="images/congrats/cloudamaze_psd_07.png" width="122" height="45" alt=""></td>
		<td colspan="10">Your order on cloudamaze.com has been placed.</td>
		<td colspan="3" rowspan="2">
			<img src="images/congrats/cloudamaze_psd_09.png" width="354" height="45" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="21" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/congrats/cloudamaze_psd_10.png" width="35" height="24" alt=""></td>
		<td colspan="5">Your reference number is <b><?php echo $_SESSION['invoice']; ?></b></td>
		<td colspan="3">
			<img src="images/congrats/cloudamaze_psd_12.png" width="33" height="24" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="24" alt=""></td>
	</tr>
	<tr>
		<td rowspan="9">
			<img src="images/congrats/cloudamaze_psd_13.png" width="50" height="166" alt=""></td>
		<td colspan="13">Please pay Rs. <b><?php echo $_SESSION['total']; ?> INR </b> via NEFT to the below bank and contact our customer support.</td>
		<td colspan="2" rowspan="2">
			<img src="images/congrats/cloudamaze_psd_15.png" width="289" height="29" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="18" alt=""></td>
	</tr>
	<tr>
		<td colspan="13">
			<img src="images/congrats/cloudamaze_psd_16.png" width="562" height="11" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="11" alt=""></td>
	</tr>
	<tr>
		<td colspan="11">
			<img src="images/congrats/cloudamaze_psd_17.png" width="491" height="20" alt=""></td>
		<td colspan="3" rowspan="6"><p>Payments via NEFT to Bank : IDBI Bank,</br>Vazhuthacaud, Thiruvananthapuram,</br>Account Holder : HELLOINFINITY</br>IFSC Code : IBKL0000046</br>Account Number : 0046102000016320</p></td>
		<td rowspan="7">
			<img src="images/congrats/cloudamaze_psd_19.png" width="31" height="137" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="20" alt=""></td>
	</tr>
	<tr>
		<td colspan="4">
			<img src="images/congrats/cloudamaze_psd_20.png" width="107" height="13" alt=""></td>
		<td colspan="2" rowspan="4">Call us on +91 890 750 9611 or drop an email to support@cloudamaze.com</td>
		<td colspan="5">
			<img src="images/congrats/cloudamaze_psd_22.png" width="121" height="13" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="13" alt=""></td>
	</tr>
	<tr>
		<td rowspan="5">
			<img src="images/congrats/cloudamaze_psd_23.png" width="27" height="104" alt=""></td>
		<td colspan="2" rowspan="2">
			<img src="images/congrats/cloudamaze_psd_24.png" width="55" height="52" alt=""></td>
		<td rowspan="5">
			<img src="images/congrats/cloudamaze_psd_25.png" width="25" height="104" alt=""></td>
		<td rowspan="5">
			<img src="images/congrats/cloudamaze_psd_26.png" width="49" height="104" alt=""></td>
		<td colspan="3" rowspan="2">
			<img src="images/congrats/cloudamaze_psd_27.png" width="61" height="52" alt=""></td>
		<td rowspan="5">
			<img src="images/congrats/cloudamaze_psd_28.png" width="11" height="104" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="29" alt=""></td>
	</tr>
	<tr>
		<td rowspan="4">
			<img src="images/congrats/cloudamaze_psd_29.png" width="141" height="75" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="23" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="3">
			<img src="images/congrats/cloudamaze_psd_30.png" width="55" height="52" alt=""></td>
		<td colspan="3" rowspan="3">
			<img src="images/congrats/cloudamaze_psd_31.png" width="61" height="52" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="11" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2">
			<img src="images/congrats/cloudamaze_psd_32.png" width="263" height="41" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="22" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/congrats/cloudamaze_psd_33.png" width="329" height="19" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="1" height="19" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/congrats/spacer.gif" width="73" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="141" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="50" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="27" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="45" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="10" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="25" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="10" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="253" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="49" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="42" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="16" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="11" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="6" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="65" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="258" height="1" alt=""></td>
		<td>
			<img src="images/congrats/spacer.gif" width="31" height="1" alt=""></td>
		<td></td>
	</tr>
</table> 
    
    <div id="buttons" >
        <div id="skip-domain" class="button">
            <div id="popup" ><a href="index.php?page=1" id="OpenContact"> Home </a></div>
            <img src="images/blue-botton.png" class="adjusted"/>
        </div>
    </div>
    
    
</div>

<?php 
//session_start();
unset($_SESSION['domain']);
?>
