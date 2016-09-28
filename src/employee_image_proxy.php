<?php
session_start();

if (isset($_SESSION)) {
    /*$customerId = $_SESSION['employee_id'];*/
    $customerId = '43081';
    $url = 'http://hrm.clbs.co.th/addonplugin/qaswebservice/keycardimglist.php?f=getKeycardImg&customerId=' . $customerId;
    echo json_decode(file_get_contents($url));

}
?>