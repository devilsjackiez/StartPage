<?php
include "function.php";
require('includes/config.php');
?>

<!doctype html>
<html lang="en" id="csstyle">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Start Page</title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
    <!-- Fonts -->
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <!--    <link rel="stylesheet" href="css/bootstrap.min.css"/>-->
    <script src="css/flat/bootstrap-reset.css"></script>
    <script src="css/flat/bootstrap.min.css"></script>
    <script src="css/flat/owl.carousel.css"></script>
    <script src="css/flat/slidebars.css"></script>
    <script src="css/flat/style-responsive.css"></script>
    <script src="css/flat/style.css"></script>
    <script src="js/jquery-3.0.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="css/jquery-ui.js"></script>
    <script src="jquery.js"></script>
    <script src="jquery.min.js"></script>
    <script src="jquery-ui-1.11.4/jquery-ui.css"></script>
    <script src="jquery-ui-1.11.4/jquery-ui.js"></script>
    <!--    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>-->
    <!--    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <!--        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>-->
    <!--        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->

</head>


<body>


<?php
session_start();
if ($_SESSION['employee_branch'] == null) { ?>
<div class="navbar navbar-inverse navbar-fixed-top " id="menu" role="navigation">
    <?php } else if ($_SESSION['employee_branch'] == "CLBS"){ ?>
    <div class="navbar navbar-inverse --clbs navbar-fixed-top " id="menu" role="navigation">
        <?php } else if ($_SESSION['employee_branch'] == "Cando"){ ?>
        <div class="navbar navbar-inverse --cando navbar-fixed-top " id="menu" role="navigation">
            <?php } else if ($_SESSION['employee_branch'] == "DBS") { ?>
            <div class="navbar navbar-inverse --DBS navbar-fixed-top " id="menu" role="navigation">
                <?php } else if ($_SESSION['employee_branch'] == "ZQS"){ ?>
                <div class="navbar navbar-inverse --ZQS navbar-fixed-top " id="menu" role="navigation">
                    <?php } ?>


                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse"><span
                                    class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                                    class="icon-bar"></span></button>
                            <a href="index.php" class="navbar__brand"
                               style="font-size: larger; font-style: inherit;font-weight: 700">Start
                                page</a></div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right ">

                                <?php if (isset($_SESSION['employee_email'])) { ?>
                                    <!--<li><a href="admin-page.php">Manage</a></li>-->
                                    <li class="dropdown">
                                        <!--<img class="img-circle" src="img/Jackie.jpg" style="width: 28px;height: 28px;" ><span style="text-indent: 2.5em"></span>-->
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-haspopup="true"
                                           aria-expanded="false">Hi <?php echo $_SESSION['employee_fullname']; ?>
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu --DropCando" id="dropChange">
                                            <li>
                                                <a href="http://jira.coast.ebuero.de/servicedesk/customer/portal/8/create/292">Give
                                                    Your Feedback</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                            <!--<li><a href="#">Another action</a></li>-->
                                        </ul>
                                    </li>
                                <?php } else { ?>
                                    <!--<li><a id="login_a" href="#">login</a></li>-->
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $('#dropChange') ==
                        var DropChanging;
                        switch (DropChanging) {
                            case <?php $_SESSION['employee_branch'] == "CLBS" ?> :
                                $('#dropChange').removeClass('.dropdown-menu');
                                $('#dropChange').addClass('.dropdown-menu' + '.--DropCando');
                        }
                    })
                </script>
</body>
