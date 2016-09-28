<?php
require('includes/config.php');
require_once('vendor/autoload.php');
include "header.php";
use GuzzleHttp\Client;

?>


<div id="first-content" class="section --red --first"">
<?php

if (isset($_SESSION['employee_email'])) {
    ?>
    <br><br><br>
    <div class="container">
        <!--<img class="img-circle center-block img-responsive" src="img/Jackie.jpg" style="width: 180px;height: 190px ;border: double;">-->


        <?php $employeeID = $_SESSION['employee_id'] ?>
        <div class="center-block">
            <h1 align="center" style="font-weight: 700;">Hello</h1>
            <br>
            <?php

            /*$url = "http://hrm.clbs.co.th/addonplugin/qaswebservice/keycardimglist.php?f=getKeycardImg&customerId="+$employeeID;*/
            $url = "http://hrm.clbs.co.th/addonplugin/qaswebservice/keycardimglist.php?f=getKeycardImg&customerId=80945";
            if($pic = json_decode(file_get_contents($url))){
                ?><img class="img-circle center-block img-responsive" src="<?php echo $pic ?>" style="width: 200px;height: 200px ;border: double;">
            <?php } else if ($pic == null) {
                ?><img class="img-circle center-block img-responsive" src="img/Jackie.jpg" style="width: 200px;height: 200px ;border: double;">
           <?php }
            ?>


            <!--
             try {
                                    $client = new \GuzzleHttp\Client();
                                    $res = $client->request('GET', $url);
                                    echo 'header status code: '.$res->getStatusCode();
                        // 200
                                    echo $res->getHeaderLine('content-type');
                        // 'application/json; charset=utf8'
                                    echo $res->getBody();
                        // {"type":"User"...'

                                }
                                catch(Exception $e) {
                                    echo $e->getMessage();
                                    echo "123";
                                }
                                ?>-->
        </div>
        <br>
        <br>
        <br>

        <div class="container">
            <div class="center-block">
                <h1 style="font-family: 'Open Sans', Arial, sans-serif;font-weight: 800; font-size: 4ch; text-align: center;">
                    Hi ! <?php echo $_SESSION['employee_fullname'] ?>, Welcome to start page</h1>
                <h2 style="font-family: 'Open Sans', Arial, sans-serif;font-weight: 800; font-size: 7ch;text-align: center;">
                    <?php echo $_SESSION['employee_branch'] ?> Company
                </h2>
            </div>
        </div>
        <br>
        <br>
        <br>

    </div>
    <?php echo "</div>";

    include "start-page.php";
} else {
    include "login-form2.php";
}
echo "</div>"; ?>
<?php include "footer.php" ?>
