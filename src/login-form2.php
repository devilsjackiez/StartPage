<?php
require('includes/config.php');
?>
<div class="col-md-8 col-md-offset-2">

    <p class="text-center">
    <div class="err" id="add_err"></div>
    </p>

</div>
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="text-center" style="font-weight: 800;color: #635593;">Login</h3>

            </div>

            <div style="padding-top:30px" class="panel-body">

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="login_form" method="POST" accept-charset="UTF-8" class="form">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="username" type="text" class="form-control" name="username" value=""
                               placeholder="username or email">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password"
                               placeholder="password">
                    </div>

                    <!-- Button -->

                    <div class="col-sm-12 controls">
                        <input class="button --cream center-block" type="submit" id="login" value="login">

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>
<script type="text/javascript">

    $(document).ready(function () {
        $("#login").click(function () {
            username = $("#username").val();
            password = $("#password").val();
            method = 'validateUser';
            $.ajax({
                type: "POST",
                url: "authen.php",
                data: "method=" + method + "&username=" + username + "&password=" + password,
                success: function (html) {
                    /*alert(html);*/
                    if (html == 'true') {
                        location.reload();
                        $.ajax({
                            url: "start-page.php",
                            dataType: "html",
                            success: function (data) {
                                $('#first-content').html('');
                                $('#first-content').after(data);
                            }
                        });
                    }
                    else {
                        $("#add_err").html("Wrong username or password");
                    }
                },
                beforeSend: function () {
                    $("#add_err").html("Loading...")
                }
            });
            return false;
        });
    });
</script>