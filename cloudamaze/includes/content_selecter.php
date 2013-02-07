<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 0;
}



switch ($page) {
    case 1: include 'register.php';
        break;
    case 2: 
        include 'connection.php'; 
        include 'hosting.php';
        break;
    case 3: include 'checkout.php';
        break;
    case 4: include 'congrats.php';
        break;
    default:
        include 'register.php';
        break;
}
?>