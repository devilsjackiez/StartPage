<?php
include 'function.php';
session_start();
$_SESSION['id_brand_select'] = $_POST['id'];

$result = getIdRole($_SESSION['id_brand_select']);
$result->bind_result($roleId, $roleName);
while ($result->fetch()) { ?>
    <div class="col-md-6 infos__item">
        <div class="panel">
            <div class="panel__heading --icon-cal">
                <h3 style="font-size: x-large;"><?php echo $roleName; ?></h3>
            </div>
            <div class="panel__body">
                <p><?php $tools = getToolByRoleAndBrand($roleId, $_SESSION['id_brand_select']);
                    $tools->bind_result($id_tool, $name_tool, $nfo, $url);
                    echo '<ul class="list" class="list-group" data-id="' . $roleId . '">';
                    while ($tools->fetch()) {
                        echo "<div class='list-item list-group-item' data-id='$id_tool' >$name_tool<span class='right'><a class='role_tools' href='#'>&times;</a></span></div>";
                    } ?>
                    </ul>
                </p>

                <a href="<?php echo $row["url"]; ?>" target="_blank" class="button center-block btn-save ">Save</a>
            </div>
        </div>
    </div>
<?php } ?>
