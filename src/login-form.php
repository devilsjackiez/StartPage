<?php
require('includes/config.php');
?>

<div class="container-fluid" style="border-style: ridge; background-color: #e9e9ff;" >
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="+handwritten text-center">Login</h2>
            <p class="text-center">
            <div class="err" id="add_err"></div>
            </p>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="login_form" method="POST" accept-charset="UTF-8" class="form">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group" >
                            <input class="form-control" placeholder="Username" id="username" name="username" type="text">
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-3">

                        <div class="form-group">
                            <input class="form-control" placeholder="Password" id="password" name="password"
                                   type="password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <p>
                            <small>Please put your windows username and password</small>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <input class="button --cream center-block" type="submit" id="login" value="login">
                    </div>
                </div>
            </form>
            <br><br><br><br>




        </div>
    </div>
</div>


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



