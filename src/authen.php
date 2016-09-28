<?php
session_start();
require('includes/config.php');
require 'vendor/autoload.php';

$username = $_POST['username'];
$password = $_POST['password'];

$client = new GuzzleHttp\Client();
$res = $client->request('POST', 'http://vmwinweb05.berlin-hq.local/ews/restful/public/v1/users/' . $username . '/auth', [
    'json' => ['password' => $password]
]);
if ($res->getStatusCode() == '200') {
// 200
//echo $res->getHeaderLine('content-type');
// 'application/json; charset=utf8'
    $results = $res->getBody();
// {"type":"User"...'
    $obj = json_decode($results, TRUE);
    $data = $obj['data']['attributes'];
    if ($data['is-auth'] == true) {
        $employee_id = $data['employee-id'];


//$session_id = $data['id'];

// Send an asynchronous request.
        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://vmwinweb05.berlin-hq.local/ews/restful/public/v1/employees/' . $employee_id);
        $promise = $client->sendAsync($request)->then(function ($response) {
            $results_emplyee = $response->getBody();
            $obj_emplyee = json_decode($results_emplyee, TRUE);

            $employee_id = $obj_emplyee['data']['id'];
            $employee_fullname = $obj_emplyee['data']['attributes']['name'];
            $employee_email = $obj_emplyee['data']['attributes']['email'];
            $employee_role = $obj_emplyee['data']['attributes']['role'];
            $employee_branch = $obj_emplyee['data']['attributes']['branch'];

            $_SESSION["employee_id"] = $employee_id;
            $_SESSION["employee_fullname"] = $employee_fullname;
            $_SESSION["employee_email"] = $employee_email;
            $_SESSION["employee_role"] = $employee_role;
            $_SESSION["employee_branch"] = $employee_branch;



            /* echo '<pre>';
            var_dump($obj_emplyee['data']);
            echo '</pre>'; */
            //print_r($SESSION);

/*            echo $employee_id,"\n";*/
/*            echo $employee_fullname,"\n";*/
/*            echo $employee_email,"\n";*/
/*            echo $employee_role,"\n";
            echo $employee_branch,"\n";*/
            echo 'true';
            /*header('Location: index.php');*/


        });
        $promise->wait();

    }
} else {
    echo 'false';
}
?>