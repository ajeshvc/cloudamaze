<?php
$con = mysql_connect("localhost", "c70cloudamaze", "hello001");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("c70cloudamaze", $con);

?>
