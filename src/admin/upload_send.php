<?php
session_start();
$fileupload = $_FILES['fileupload']['tmp_name'];
$fileupload_name = $_FILES['fileupload']['name'];

$fileupload_size = $_FILES['fileupload']['size'];
$fileupload_type = $_FILES['fileupload']['type'];

/*$_SESSION['filenameUpload'] = $fileupload_name;*/


if ($fileupload) {
    $array_last = explode(".", $fileupload_name);
    $c = count($array_last) - 1;
    $lastname = strtolower($array_last[$c]);
    $_SESSION['filenameUpload'] = $fileupload_name;
    if ($lastname == "gif" or $lastname == "jpg" or $lastname = "jpeg" or $lastname = "PNG" or $lastname = "png") {
        copy($fileupload, "uploads/" . $fileupload_name);
        echo "< h2>Upload รูปภาพเรียบร้อยแล้ว< /h2>";
        echo "< img src='uploads/$fileupload_name'>";

    } else {
        echo "< h3>ไม่สามารถ Upload ได้ < /h3>";
    }

    unlink($fileupload);
} else {
    echo "< h3>ERROR : ไม่สามารถ Upload ได้< /h3>";
}

?>