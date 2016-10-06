<div class="section --dark --sm">
    <div class="container">
        <div class="row">
            <div class="infos">
                <?php
                $id_role = $_SESSION['employee_role'];
                $id_brand = $_SESSION['employee_branch'];
                /*                $id_role = 6 ;
                                $id_brand = 1001;*/
                if ($id_role == "Agent") {
                    $id_role = 1;
                } else if ($id_role == "Team Leader") {
                    $id_role = 2;
                } else if ($id_role == "HR") {
                    $id_role = 3;
                } else if ($id_role == "Trainer") {
                    $id_role = 4;
                } else if ($id_role == "Manager") {
                    $id_role = 5;
                } else if ($id_role == "Non-Agent") {
                    $id_role = 6;
                } else if ($id_role == "Customer Support") {
                    $id_role = 7;
                }

                if ($id_brand == "CLBS") {
                    $id_brand = 1001;
                } else if ($id_brand == "Cando") {
                    $id_brand = 1002;
                } else if ($id_brand == "DBS") {
                    $id_brand = 1003;
                } else if ($id_brand == "ZQS") {
                    $id_brand = 1004;
                }
                $tools = getToolByRoleAndBrand($id_role, $id_brand);
                /*$tools = getToolAll();*/
                $tools->bind_result($id_tool, $name_tool, $info_tool, $url_tool, $img_tool);

                while ($tools->fetch()) { ?>
                    <div class="col-md-4 infos__item">
                        <div class="panel \--show" style="bottom: 0px; width: 375px; height: 278px;">
                            <div class="panel__heading --icon-cal">
                                <h3>
                                    <!--<img src="img/gears.png"
                                         class="pro-img-box" width="60px" ; height="60px" ;> --><?php /*echo $name_tool; */ ?>
                                    <img src="admin/<?php echo $img_tool ?>"
                                         class="img-rounded" width="60px" ; height="60px" ;> <?php echo $name_tool; ?>
                                </h3>
                            </div>
                            <div class="panel__body" style="height: 100px;">
                                <p style="font-size: 13px;text-indent: 2.5em;"><?php echo $info_tool; ?></p>
                                <!--<a href="<?php /*echo $url_tool; */?>" target="_blank" class="button center-block">Click</a>-->
                            </div>
                            <div class="panel__bottom" >
                                <a href="<?php echo $url_tool; ?>" target="_blank" class="button \--cream center-block">Click</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
