<?php include "header.php" ?>
<style>
    .panel{
        width: 100%;
    }
    ul {
        padding:0;

        list-style:none;
    }
    .item {
        cursor:pointer;
        /* <-- this code is important! because you must make sure that draggable item has smaller size than dropable element */
    }
    .list {
        border:1px solid #000000;

        height:auto;
        min-height: 300px;
        background:#f0f0f0;
    }
    .border {
        background:red;
        border-width:2px;
    }
    span.right {
        float: right;
    }
    .list-item{
        display: inline-block;
        width:100%;
    }
</style>
<div class="section --red --first">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="sel1"><h2>Please select brand:</h2></label>
                    <select class="form-control" id="brandSelect">
                        <?php
                        $brand= getBrandAll();
                        $brand->bind_result($id_brand, $name);
                        $choose_brand='';
                        $all_brand='';
                        if (isset($_SESSION['id_brand_select'])){
                            while ($brand->fetch()){
                                if($id_brand == $_SESSION['id_brand_select']){
                                    $choose_brand="<option  value='$id_brand' >$name</option>";
                                }else{
                                    $all_brand .= "<option  value='$id_brand' >$name</option>";
                                }

                            }
                            echo $choose_brand . $all_brand;
                        }else{
                            echo "<option  value='' >-- Select Brand --</option>";
                            while($brand->fetch()) {
                                echo "<option  value='$id_brand' >$name</option>";
                            }
                        } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section --dark --sm">
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="panel">
                    <div class="title-tool">
                        <h2>Tools</h2>
                    </div>
                    <div class="panel__body">
                        <?php
                        $tools = getToolAll();
                        $tools->bind_result($id_tools, $name,$info,$url);
                        echo "<ul class='tool-container'>";
                        while($tools->fetch()) {
                            echo "<li class='item list-group-item' data-title='$name' data-id='$id_tools' >$name<span class='right contain_tools'><a class='del_tool' href='#' data-id='$id_tools'>&times;</a></span></li>";
                        }
                        echo "</ul>";
                        ?>
                        <a href="" target="_blank" class="button center-block btn" data-toggle="modal" data-target="#exampleModal">Add</a>
                    </div>
                </div>
            </div>
            <div class="infos col-md-9" id="manage_role">

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog" >
        <div class="modal-content">
            <form class="cmxform" id="commentForm" method="post" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="exampleModalLabel">Tools</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name-tool"  class="control-label">Name:</label>
                        <input type="text" class="form-control" name="name-tool" id="name-tool"required>
                    </div>
                    <div class="form-group">
                        <label for="info-tool" class="control-label">Information:</label>
                        <textarea class="form-control" name="info-tool" id="info-tool" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="url-tool" class="control-label">Website:</label>
                        <input type="url" class="form-control" name="url-tool" id="url-tool" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                    <input class="btn btn-default submit" type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var contents = '';
        var contentId;

        $('.tool-container > .item').draggable({
            containment: "document",
            revert: true,
            start: function () {
                //  contents = $(this).value;
                contents = $(this).attr('data-title');
                contentId = parseInt($(this).data('id'));
            }
        });

        initToolBox();
        function initToolBox() {
            $('.list').each(function(i, listElement) {
                $(listElement).droppable({
                    hoverClass: 'border',
                    accept: function(draggable) {
                        var draggableId = $(draggable).data('id');
                        var canAdded = $(draggable).hasClass('item') && $(listElement).find('div[data-id="' + draggableId + '"]').length === 0;
                        return canAdded;
                    },
                    drop: function () {
                        $(listElement).append('<div class="list-item list-group-item" data-id="' + contentId + '">' + contents + '<span class="right"><a href="#">&times;</a></span></div>');
                    }
                });
            });
        }

        $(document).on('click', '.right a.role_tools', function(){
            $(this).closest('div').remove()
        });

        $(document).on('click', '.btn-save', function(e) {
            e.preventDefault();
            var brandId = parseInt( $('#brandSelect').val() );
            // $(this).attr('disabled', 'disabled');
            var lists = [];
            var listElement = $(this).parent().find('> .list')[0];
            var listId = parseInt( $(listElement).data('id') );
            var listTools = $(listElement).find('> .list-item').map(function(i, item) {
                return parseInt( $(item).data('id') );
            }).toArray();
            if (listTools.length > 0) {
                lists.push({
                    listId: listId,
                    listTools: listTools
                });
            }
            if (lists.length > 0) {
                $.ajax({
                    url: 'function.php',
                    data: {
                        method: 'save',
                        lists: lists,
                        brandId: brandId
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        alert('success');
                    }
                });
            }
        });

        $("#commentForm").validate({
            submitHandler: function(form) {
                $.ajax({
                    url: 'function.php',
                    data: $('#commentForm').serialize()+ "&method=insertTools",
                    type: 'POST',
                    success: function(data) {
                        console.log(data);
                        location.reload();
                        $('.btn-close').click();
                    }
                });
            }
        });
        $(document).on('click', '.right.contain_tools a.del_tool', function(){
            var confirmmssg = confirm("Delete This?");
            // alert(confirmmssg);
            if (confirmmssg ){
                id = $(this).attr('data-id');
                //  alert(id);
                $.ajax({
                    type: "POST",
                    url: "function.php",
                    data: "id=" + id+"&method=deleteToolsAll",
                    success: function(e){
                        //  alert(e);
                        location.reload();
                    }
                });
            }
        });

        $('#brandSelect').on('change', function(){
            if($('#brandSelect').val()){
                //alert($('#brandSelect').val());
                $.ajax({
                    type: "POST",
                    url: "manage_role.php",
                    data: "id=" + $('#brandSelect').val(),
                    success: function(e){
                        $('#manage_role').html(e);
                        initToolBox();
                    }
                });
            }else {
                $('#manage_role').html('');
            }
        }).trigger('change');
    });
</script>
<?php include "footer.php" ?>

</body>
</html>
