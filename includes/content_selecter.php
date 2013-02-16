<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 0;
}



switch ($page) {
    case 1: 
        include 'includes/phpresellerclub/src/config.php';
        include 'includes/phpresellerclub/src/core/parameter.php';
        include 'includes/phpresellerclub/src/domain/check-availability.php';
        include 'register.php';
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
