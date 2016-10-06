<?php
include('header.php');
include('connect.php');
?>

<?php if (isset($_SESSION['name'])) { ?>
    <div class="section">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <h1>Update Data With Modal</h1>
            </div>
        </div><!-- /.row -->
        <br><br>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table datatable table-responsive">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Information</th>
                        <th>Url</th>
                        <!--<th>Img Url</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    /*$tools = getToolAll();
                    $tools->bind_result($id_tools, $name, $info, $url, $img);*/
                    $i = 1;
                    foreach ($tools as $to) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $to['name']; ?></td>
                            <td><?php echo $to['info']; ?></td>
                            <td><?php echo $to['url']; ?></td>
                            <!--<td><?php /*echo $to['id_tools']; */ ?></td>-->
                            <!--<td><?php /*echo $name; */ ?></td>
                            <td><?php /*echo $info; */ ?></td>
                            <td><?php /*echo $url; */ ?></td>-->
                            <!--<td><?php /*echo $id_tools; */ ?></td>-->
                            <!--<td><?php /*echo $img; */ ?></td>-->
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle"
                                            class="drop-edit" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                        <span class="caret"></span>
                                        <span class="glyphicon glyphicon-wrench"></span>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li><a href="#" class="edit-customer"
                                               data-toggle="modal"
                                               data-target="#formEditCustomer"
                                               data-id="<?php echo $to['id_tools']; ?>"
                                               data-name="<?php echo $to['name']; ?>"
                                               data-info="<?php echo $to['info']; ?>"
                                               data-url="<?php echo $to['url']; ?>"
                                            >Edit</a></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </div><!-- /.dropdown -->
                            </td>
                        </tr>
                        <?php
                        $i++;
                    } // end foreach
                    ?>
                    </tbody>
                </table>
            </div><!-- /.col-md-8 -->
            <div class="col-md-2"></div>
        </div>
    </div>

<?php } else include "login_form.php";?>

    <!-- Modal Zone -->
    <div class="modal fade" id="formEditCustomer">
        <div class="modal-dialog">
            <form action="save.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Tools</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden Zone -->
                        <div class="form-group">
                            <label for="toolName" class="control-label">tool Name : </label>
                            <input type="text" class="form-control" id="tool_Name" name="tool_Name">
                        </div>
                        <div class="form-group">
                            <label for="toolInfo" class="control-label">tool Info : </label>
                            <textarea class="form-control" id="tool_Info" name="tool_Info"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="toolUrl" class="control-label">tool Url : </label>
                            <input type="url" class="form-control" id="tool_Url" name="tool_Url">
                        </div>
                        <!--<div class="form-group">
                            <label for="country" class="control-label">tool Img Url : </label>
                            <input type="url" class="form-control" id="toolImgUrl" name="toolImgUrl">
                        </div>-->
                        <div class="form-group hidden">
                            <label for="tool_ID" class="control-label">tool ID : </label>
                            <input type="text" class="form-control" id="tool_ID" name="tool_ID">
                        </div>

                    </div><!--/.modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Close
                        </button>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div><!--/.modal-footer-->
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <script>

        $('.edit-customer').click(function () {
// get data from edit btn
            var name = $(this).attr('data-name');
            var info = $(this).attr('data-info');
            var url = $(this).attr('data-url');
            var idtool = $(this).attr('data-id');
// set value to modal
            $("#tool_Name").val(name);
            $("#tool_Info").val(info);
            $("#tool_Url").val(url);
            $("#tool_ID").val(idtool);
        });

        /*        $("#elementDataUpload").submit(function (e) {
         e.preventDefault();
         console.log(e.target());
         $.ajax({
         url: 'function.php',
         data: $('#elementDataUpload').serialize() + "&method=UpdateTools",
         type: 'POST',
         success: function (data) {
         console.log(data);
         },
         error: function (jqXHR, textStatus, errorThrown) {
         console.error(textStatus, errorThrown);
         }
         });
         });*/
    </script>
<?php
include('footer.php');
?>