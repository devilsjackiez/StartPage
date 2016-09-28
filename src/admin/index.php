<?php
require('../includes/config.php');
require('../vendor/autoload.php');
/*require ('check_session.php');*/
require_once "header.php";
?>

<div id="first-content" class="section --red --first"">
<?php

if (isset($_SESSION['user_name'])) {
    ?>
    <br><br><br>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="center-block">
            <h1 style="font-family: 'Open Sans', Arial, sans-serif;font-weight: 800; font-size: 3.5ch; text-align: center;">
                Hi ! <?php echo $_SESSION['name'] ?>, Welcome to Admin Management Page</h1>
            <!--            <h2 style="font-family: 'Open Sans', Arial, sans-serif;font-weight: 800; font-size: 7ch;text-align: center;">
                <?php /*echo $_SESSION['id_brand'] */ ?> Company
            </h2>-->
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    </div>
    <?php echo "</div>";

    include "start-page.php";
} else {
    include "login_form.php";
}
echo "

    </div>"; ?>
<?php include "footer.php" ?>
