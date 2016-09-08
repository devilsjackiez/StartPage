<html>
<head>
    <title>Connecting MySQL Server</title>
</head>
<body>
<?php

function conectDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "start_page";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "successful";
    return $conn;
}

function getTools_roles($id_role)
{

    $conn = conectDB();
    $sql = "SELECT distinct tools.name ,tools.info ,tools.url FROM tools INNER JOIN tool_role ON tool_role.id_roles=" . $id_role;
    $result = mysqli_query($conn, $sql);

    //while($row = mysqli_fetch_assoc($result))
    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }

}

function getRole($id_brand)
{
    $conn = conectDB();
    $sql = "";

}

function validate_user($user, $pass)
{
    $conn = conectDB();
    $sql = "SELECT id_brand,id_role FROM `employee` WHERE username='admin' and password='admin'";
    $result = mysqli_query($conn, $sql);

    if (isset($result)) {
        return $result;
    } else {
        return null;
    }
}

$result = getTools_roles(1);

$brand_role = validate_user("admin", "admin");
while ($row = mysqli_fetch_assoc($brand_role)) {
    echo "id_brand: " . $row["id_brand"] . " - id_role: " . $row["id_role"] . "<br>";
}
while ($row = mysqli_fetch_assoc($result)) {
    echo "name: " . $row["name"] . " - info: " . $row["info"] . "-url " . $row["url"] . "<br>";
}
?>
</body>
</html>