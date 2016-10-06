<?php
include('connect.php');
include('function.php');
// Set Query SQL

$conn = conectDB();
$stmt = $conn->prepare("UPDATE `tools` SET `name` = ?,`info`=?,`url`=? WHERE `id_tools`= ?");
$stmt->bind_param('sssi',$_POST['tool_Name'], $_POST['tool_Info'], $_POST['tool_Url'] ,$_POST['tool_ID']);
$stmt->execute();
$stmt->close();
$stmt->close();
header('Location: edit-page.php');
?>