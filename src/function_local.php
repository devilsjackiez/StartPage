<?php
/*require('authen.php');*/
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : null;

switch ($method) {
    case 'validateUser':
        $function = validateUser($_POST['username'], $_POST['password']);
        echo $function;
        break;

    case 'save':
        if (isset($_POST['lists']) && isset($_POST['brandId'])) {
            $tools = $_POST['lists'];
            $brandId = $_POST['brandId'];
            foreach ($tools as $index => $tool) {
                $roleId = $tool['listId'];
                $tools = $tool['listTools'];
                updateToolsOnRoleIdAndBrandId($roleId, $brandId, $tools);
            }
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
        break;
    case 'insertTools':
        $name = $_POST['name-tool'];
        $info = $_POST['info-tool'];
        $url = $_POST['url-tool'];
        $function = insertTools($name, $info, $url);
        echo $function;
        break;
    case 'deleteToolsAll':
        $function = deleteToolsAll($_POST['id']);
        echo $function;
        break;
}

function conectDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "start_page";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "successful";
    return $conn;
}
function validateUser($username, $password)
{
    $conn = conectDB();
    $stmt = $conn->prepare("SELECT * FROM employee WHERE username=? AND password=?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id_emp, $name, $id_brand, $username, $psw, $id_role);
    session_start();

    if ($stmt->num_rows > 0) {
        while ($stmt->fetch()) {
            $_SESSION['name'] = $name;
            $_SESSION['user_name'] = $username;
            $_SESSION['id_role'] = $id_role;
            $_SESSION['id_brand'] = $id_brand;
        }
        echo 'true';

    } else {
        echo 'false';
    }
}
function getIdRole($id_brand)
{

    $conn = conectDB();
    $stmt = $conn->prepare("SELECT distinct role.id_role, role.name FROM brand_role_tool INNER JOIN role ON brand_role_tool.id_brand=? and role.id_role = brand_role_tool.id_role");
    $stmt->bind_param('i', $id_brand);
    $stmt->execute();
    $stmt->store_result(); // need to call before using  $stmt->num_rows
    if ($stmt->num_rows > 0) {
        return $stmt;
    } else {
        return null;
    }
}
function getToolByRoleAndBrand($id_role, $id_brand)
{
    $conn = conectDB();
    $stmt = $conn->prepare("SELECT distinct brand_role_tool.id_tool ,tools.name,tools.info,tools.url,tools.img FROM brand_role_tool INNER JOIN tools ON brand_role_tool.id_tool=tools.id_tools and brand_role_tool.id_role =? AND brand_role_tool.id_brand=?");
    $stmt->bind_param('ii', $id_role, $id_brand);
    $stmt->execute();
    $stmt->store_result(); // need to call before using  $stmt->num_rows
    if ($stmt->num_rows > 0) {
        return $stmt;
    } else {
        return null;
    }

}
function getBrandAll()
{
    $conn = conectDB();
    $stmt = $conn->prepare("SELECT * FROM brands");
    $stmt->execute();
    $stmt->store_result(); // need to call before using  $stmt->num_rows
    if ($stmt->num_rows > 0) {
        return $stmt;
    } else {
        return null;

    }
}
function getToolAll()
{
    $conn = conectDB();
    $stmt = $conn->prepare("SELECT * FROM tools");
    $stmt->execute();
    $stmt->store_result(); // need to call before using  $stmt->num_rows
    if ($stmt->num_rows > 0) {
        return $stmt;
    } else {
        return null;
    }
}
function insertTools($name, $info, $url)
{
    $conn = conectDB();
    $stmt = $conn->prepare("INSERT INTO tools (name, info, url) VALUES (?,?,?)");
    $stmt->bind_param('sss', $name, $info, $url);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
/*function updateTools($name, $info, $url)
{

}*/
function deleteToolsAll($toolId)
{
    $conn = conectDB();
    $stmt = $conn->prepare("DELETE FROM tools WHERE id_tools= ?");
    $stmt->bind_param('i', $toolId);
    $stmt->execute();
    $stmt = $conn->prepare("DELETE FROM brand_role_tool WHERE id_tool= ?");
    $stmt->bind_param('i', $toolId);
    $stmt->execute();
    $stmt->close();
    $conn->close();

}
function deleteToolsFromRoleIdAndBrandId($roleId, $brandId)
{
    $conn = conectDB();
    $stmt = $conn->prepare("DELETE FROM brand_role_tool WHERE id_role = ? AND id_brand = ?");
    $stmt->bind_param('ii', $roleId, $brandId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
function insertToolsOnRoleIdAndBrandId($roleId, $brandId, $tools)
{
    $conn = conectDB();
    $stmt = $conn->prepare("INSERT INTO brand_role_tool (id_role, id_brand, id_tool) VALUES (?,?,?)");
    $stmt->bind_param('iii', $roleId, $brandId, $toolId);
    foreach ($tools as $index => $_toolId) {
        $toolId = $_toolId;
        $stmt->execute();
    }
    $stmt->close();
    $conn->close();
}
function updateToolsOnRoleIdAndBrandId($roleId, $brandId, $tools)
{
    deleteToolsFromRoleIdAndBrandId($roleId, $brandId);
    insertToolsOnRoleIdAndBrandId($roleId, $brandId, $tools);
}
function getTools($id_role)
{
    $conn = conectDB();

    $stmt = $conn->prepare("SELECT distinct tools.name ,tools.info ,tools.url FROM tools INNER JOIN tool_role ON tool_role.id_roles=?");
    $stmt->bind_param('i', $id_role);
    $stmt->execute();
    $stmt->store_result(); // need to call before using  $stmt->num_rows
    if ($stmt->num_rows > 0) {
        return $stmt;
    } else {
        return null;
    }
}