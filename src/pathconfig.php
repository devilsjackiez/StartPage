<?php
session_start();
switch ($_SESSION['employee_branch']){
    case "CLBS" : $sourcepath = 'http://vmwinweb05.berlin-hq.local/kitchentv/';break;
    case "CANDO" : $sourcepath = 'http://vmwinweb05.berlin-hq.local/kitchentv/cando/';break;
    case "DBS" :$sourcepath = 'http://vmwinweb05.berlin-hq.local/kitchentv/dbs/';break;
    case "ZQS" :$sourcepath = 'http://vmwinweb05.berlin-hq.local/kitchentv/zqs/';break;
}
?>