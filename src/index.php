<?php

require('includes/config.php');
include "header.php" ?>

<div id="first-content" class="section --red --first">
    <?php

    if (isset($_SESSION['employee_email'])) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Hi <?php echo $_SESSION['employee_fullname'] ?>, Welcome to start page</div>
            </h1>
        </div>
    </div>
</div>
<?php echo "</div>";

include "start-page.php";
} else {
    include "login-form.php";
}
echo "</div>"; ?>
<?php include "footer.php" ?>
