<?php
require 'vendor/autoload.php';

function validateUserFrom_Service($username,$password){
    $client = new GuzzleHttp\Client();
    $res = $client->request('POST', 'http://vmwinweb05.berlin-hq.local/ews/restful/public/v1/users/'.$username.'/auth', [
        'json' => ['password' => $password]
    ]);
    echo $res->getStatusCode();

    // 200
    echo $res->getHeaderLine('content-type');
    // 'application/json; charset=utf8'
    echo $res->getBody();
    // {"type":"User"...'
    if($res->getStatusCode() == '200'){
        $json = $res->getBody();;
        $json = json_decode($json, true);
        echo $json->data->attribute->employee-id;
        echo $json['productId'];
        echo $json['status'];
        echo $json['opId'];
        echo 'Correct';

    }
    else{
        echo 'Worng user and password';

    }
}

echo validateUserFrom_Service('l.chuamsakul','Krystal');
