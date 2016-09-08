<?php

require('includes/config.php');
?>
<div class="section --dark --sm">
    <div class="container">
        <div class="row">
            <div class="infos">
                <?php
                $id_role = $_SESSION['employee_role'];
                $id_brand = $_SESSION['employee_branch'];
                $tools = getToolByRoleAndBrand($id_role, $id_brand);
                $tools->bind_result($id_tool, $name_tool, $info_tool, $url_tool);

                while ($tools->fetch()) { ?>
                    <div class="col-md-4 infos__item">
                        <div class="panel">
                            <div class="panel__heading --icon-cal">
                                <h3><img src="<?php echo $image_url = "http://www.clbs.co.th/images/clbs_jobs.jpg" ?>"
                                         class="img-circle" width="60px" ; height="60px" ;> <?php echo $name_tool; ?>
                                </h3>
                            </div>
                            <div class="panel__body">
                                <p style="font-size: 13px"><?php echo $info_tool; ?></p>
                                <a href="<?php echo $url_tool; ?>" target="_blank" class="button center-block">Click</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
