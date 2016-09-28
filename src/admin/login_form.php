<br><br><br><br>
<div class="container" style="border-style: ridge; background-color: #413a60;">
    <br>
    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="+handwritten text-center" style="color: white;">Login as Admin</h2>
            <p class="text-center">
            <div class="err" id="add_err" style="color: crimson;"></div>
            </p>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="login_form" method="POST" action="login.php" accept-charset="UTF-8" class="form">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" id="username" name="username"
                                   type="text">
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
                        <p style="color: white; font-weight: bolder">
                            <small>Please put your windows username and password</small>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <input class="button  center-block" type="submit" id="login" value="login">
                    </div>
                </div>
            </form>


        </div>

    </div>
    <div class="text-right">
        <a href="../index.php"><span style="font-weight: bold; color: #342370;">UserPage</span></a>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<script>
    $(document).ready(function () {
        $("#login").click(function () {
            username = $("#username").val();
            password = $("#password").val();
            method = 'validateUser';
            $.ajax({
                type: "POST",
                url: "login.php",
                data: "method=" + method + "&username=" + username + "&password=" + password,
                success: function (html) {
                    /*alert(html);*/
                    if (html == 'true') {
                        location.reload();
                        $.ajax({
                            url: "start_page.php",
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



