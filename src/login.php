<?php
session_start();
require 'vendor/autoload.php';
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

    if ($stmt->num_rows > 0) {

        while ($stmt->fetch()) {
            $_SESSION['name'] = $name;
            $_SESSION['user_name'] = $username;
            $_SESSION['id_role'] = $id_role;
            $_SESSION['id_brand'] = $id_brand;;
        }

        echo 'true';
    } else {
        echo 'false';
    }

}

function validateUserFrom_Service($username, $password)
{
    $client = new GuzzleHttp\Client();
    $res = $client->request('POST', 'http://vmwinweb05.berlin-hq.local/ews/restful/public/v1/users/' . $username . '/auth', [
        'json' => ['password' => $password]
    ]);
    // echo $res->getStatusCode();

    // 200
    // echo $res->getHeaderLine('content-type');
    // 'application/json; charset=utf8'
    // echo $res->getBody();
    // {"type":"User"...'
    if ($res->getStatusCode() == '200') {
        $_SESSION['employee_fullname'] = $name;
        $_SESSION['user_name'] = $username;
        $_SESSION['employee_role'] = $id_role;
        $_SESSION['employee_branch'] = $id_brand;
        echo 'true';

    } else {
        echo 'false';

    }
}

$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : null;
switch ($method) {
    case 'validateUser':
        $function = validateUser($_POST['username'], $_POST['password']);
        echo $function;
        break;

    case 'add':
        $toolName = isset($_POST['toolName']) ? $_POST['toolName'] : '';
        $tool = addTool($toolName);
        echo json_encode($tool);
        break;
}
?>
