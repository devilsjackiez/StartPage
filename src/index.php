<?php
require('includes/config.php');
require_once('vendor/autoload.php');
include "header.php";
use GuzzleHttp\Client;

?>


<div id="first-content" class="section --red --first"">
<?php

if (isset($_SESSION['employee_fullname'])) {
    ?>
    <br>
    <div class="container-fluid">
        <div class="col-md-4" style="margin-left: 200px;">
            <!--<img class="img-circle center-block img-responsive" src="img/Jackie.jpg" style="width: 180px;height: 190px ;border: double;">-->
            <?php $employeeID = $_SESSION['employee_id'] ?>
            <div class="center-block">
                <br>
                <br>
                <?php
                @ini_set('display_errors', '0');
                $url = "http://hrm.clbs.co.th/addonplugin/qaswebservice/keycardimglist.php?f=getKeycardImg&customerId=".$employeeID;
                if ($pic = json_decode(file_get_contents($url))) { ?>
                    <img class="img-circle img-responsive" src="<?php echo $pic ?>"
                         style="width: 180px;height: 180px ;border-style: ridge;margin-left: 170px;">
                <?php } else {
                    $picture = 'img/picb.png'; ?>
                    <img class="img-circle img-responsive" src="<?php echo $picture ?>"
                         style="width: 180px;height: 180px ;border-style: ridge;margin-left: 170px;">
                <?php } ?>

            </div>
            <br>
            <br>
            <div class="center-block">

                <!--Wellcome Name and HI-->
                <?php if ($_SESSION['employee_branch'] == 'CLBS') { ?>
                    <h2 style="font-family: 'Open Sans', Arial, sans-serif;font-weight: 800; font-size: 2.5ch; ">
                        Hi ! <?php echo $_SESSION['employee_fullname'] ?>, have a great day!</h2>
                <?php } else if ($_SESSION['employee_branch'] == 'CANDO') { ?>
                    <h2 style="font-family: 'Patrick Hand', sans-serif;font-weight: 800; font-size: 3.4ch;color:#66b9ff; ">
                        Hi ! <?php echo $_SESSION['employee_fullname'] ?>, have a great day!</h2>
                <?php } else if ($_SESSION['employee_branch'] == 'DBS') { ?>
                    <h2 style="font-family: 'Open Sans', Arial, sans-serif;font-weight: 800; font-size: 3ch; ">
                        Hi ! <?php echo $_SESSION['employee_fullname'] ?>, hab einen tollen Arbeitstag!</h2>
                <?php } else if ($_SESSION['employee_branch'] == 'ZQS') { ?>
                    <h2 style="font-family: 'Open Sans', Arial, sans-serif;font-weight: 800; font-size: 3ch; ">
                        Hi ! <?php echo $_SESSION['employee_fullname'] ?>, have a great day!</h2>
                <?php } ?>

                <?php echo $_SESSION['employee_id']; ?>
                <?php echo $_SESSION['employee_role']; ?>
            </div>
            <br>
        </div>
        <div class="col-md-6">
            <?php
            session_start();
            include "SimpleDOM.php";
            include "pathconfig.php";
            ?>


            <div class="breaking-news">
                <?php
                switch ($_SESSION['employee_branch']){
                    case "CLBS": ?><h1 style="font-family: 'Open Sans', sans-serif; color: #413a60; font-size: 2em;font-weight:600;">BREAKING NEWS:</h1><?php ;break;
                    case "CANDO": ?><h1 style="font-family: 'Patrick Hand', sans-serif; color: #904425; font-size: 2em;font-weight:600;">BREAKING NEWS:</h1><?php ;break;
                    case "DBS": ?><h1 style="font-family: 'Open Sans', sans-serif; color: #262626; font-size: 2em;font-weight:600;">BREAKING NEWS:</h1><?php ;break;
                    case "ZQS": ?><h1 style="font-family: 'Open Sans', sans-serif; color: #911a1e; font-size: 2em;font-weight:600;">BREAKING NEWS:</h1><?php ;break;
                }
                ?>
                <!--<h1 style="font-family: 'Patrick Hand', sans-serif; color: crimson">BREAKING NEWS:</h1>-->

                <?php
                switch ($_SESSION['employee_branch']) {
                    case "CLBS" :
                        $xmlUrl = "http://vmwinweb05.berlin-hq.local/kitchentv/reports.xml";
                        break;
                    case "CANDO" :
                        $xmlUrl = "http://vmwinweb05.berlin-hq.local/kitchentv/cando/reports.xml";
                        break;
                    case "DBS" :
                        $xmlUrl = "http://vmwinweb05.berlin-hq.local/kitchentv/dbs/reports.xml";
                        break;
                    case "ZQS" :
                        $xmlUrl = "http://vmwinweb05.berlin-hq.local/kitchentv/zqs/reports.xml";
                        break;
                }
                /*$xmlUrl = "http://vmwinweb05.berlin-hq.local/kitchentv/reports.xml";*/
                $xmlStr = file_get_contents($xmlUrl);
                $xmlObj = simpledom_load_string($xmlStr);
                $arrXml = objectsIntoArray($xmlObj);
                $xml = simpledom_load_file($xmlUrl);

                if (phpversion() >= '5.3.0') {
                    $bar_count = $xml->count();
                } else {
                    $doc = new SimpleDOM();
                    $str = $xml->asPrettyXML();
                    $doc->loadXML($str);
                    $bar_count = $doc->getElementsByTagName("report")->length;
                }
                ?>
                <ul class="bxslider" style="width: 1020px">
                    <?php for ($y = 0; $y < $bar_count; $y++) {
                        $ID = $arrXml["report"][$y]["ID"];
                        //$employeeID = $arrXml['report'][$y]["employeeID"];
                        $reportHeadline = $arrXml["report"][$y]["reportHeadline"];
                        $reportContent = $arrXml["report"][$y]["reportContent"];
                        // $employeeName = $arrXml["report"][$y]["employeeName"];
                        $imageName = $arrXml["report"][$y]["imageName"];
                        ?>
                        <li id="row-report-<?php echo $ID; ?>">

                            <?php switch ($_SESSION['employee_branch']) {
                                case "CLBS" : ?><h3 style="color: #984f7e;"><?php echo $reportHeadline; ?></h3>
                                    <?php ;
                                    break;
                                case "CANDO" : ?><h3
                                    style="color: #e8683b;font-family:'Patrick Hand', sans-serif;"><?php echo $reportHeadline; ?></h3>
                                    <?php ;
                                    break;
                                case "DBS" : ?><h3 style="font-family: sans-serif; color: #66b9ff; font-size: 27px;"><?php echo $reportHeadline; ?></h3>
                                    <?php ;
                                    break;
                                case "ZQS" : ?><h3 style="font-family: sans-serif; color: #0d3355; font-size: 27px;"><?php echo $reportHeadline; ?></h3>
                                    <?php ;
                                    break;
                            } ?>
                            <!--<h3><?php /*echo $reportHeadline; */ ?></h3>-->

                            <div class="photo-news-border">
                                <?php if ($imageName != "") { ?>
                                    <img src="<?php echo $sourcepath . '/files/' . $imageName; ?>"/>
                                <?php } else { ?>
                                    <img src="http://placehold.it/587x587"/>
                                <?php } ?>
                            </div>

                            <?php switch ($_SESSION['employee_branch']) {
                                case "CLBS" : ?><p
                                    style="font-family: sans-serif;font-size: 23px;color:#231631;"><?php echo $reportContent; ?></p><?php ;
                                    break;
                                case "CANDO" : ?><p
                                    style="font-family: 'Patrick Hand', sans-serif;font-size: 25px;color:#66b9ff;"><?php echo $reportContent; ?></p><?php ;
                                    break;
                                case "DBS" : ?><p
                                    style="font-family: sans-serif;font-size: 24px;color:#3e6f98;"><?php echo $reportContent; ?></p><?php ;
                                    break;
                                case "ZQS" : ?><p
                                    style="font-family: sans-serif;font-size: 24px;color:#0a2038;"><?php echo $reportContent; ?></p><?php ;
                                    break;
                            }
                            ?>
                            <!--<p><?php /*echo $reportContent; */ ?></p>-->
                            <!--<div class="heading-name">From <span><?php //echo $employeeName; ?></span></div> -->
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(function () {
                        $('.praiseslider').bxSlider({
                            mode: 'horizontal',
                            pause: 10000,
                            speed: 2000,
                            infiniteLoop: true,
                            auto: true
                        });
                        $('.bxslider').bxSlider({
                            mode: 'vertical',
                            pause: 5000,
                            speed: 2000,
                            infiniteLoop: true,
                            auto: true
                        });
                    });
                });
            </script>
        </div>
    </div>
    <br><br>

    <?php echo "</div>";
    include "start-page.php";
} else {
    include "login-form2.php";
}
echo "</div>"; ?>
<?php include "footer.php" ?>
