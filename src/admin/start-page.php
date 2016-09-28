<div class="section --dark --sm">
    <div class="container">
        <div class="row">
            <div class="infos">
                <?php
                $id_role = $_SESSION['id_role'];
                $id_brand = $_SESSION['id_brand'];
                $tools = getToolAll();
                $tools->bind_result($id_tool, $name_tool, $info_tool, $url_tool, $img_tool);

                while ($tools->fetch()) { ?>
                    <div class="col-md-4 infos__item">
                        <div class="panel \--show" style="bottom: 0px;">
                            <div class="panel__heading --icon-cal">
                                <h3>
                                    <!--<img src="--><?php /*echo $image_url = "http://www.clbs.co.th/images/clbs_jobs.jpg" */?>
                                    <img src="<?php echo $img_tool ?>"
                                         class="img-circle" width="60px" ; height="60px" ;> <?php echo $name_tool; ?>
                                </h3>
                            </div>
                            <div class="panel__body" style="height: 100px;">
                                <p style="font-size: 13px;text-indent: 2.5em;"><?php echo $info_tool; ?></p>
                                <!--<a href="<?php /*echo $url_tool; */?>" target="_blank" class="button center-block">Click</a>-->
                            </div>
                            <div class="panel__bottom" >
                                <a href="<?php echo $url_tool; ?>" target="_blank" class="button center-block">Click</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
