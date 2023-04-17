<?php

    header("Content-Type: application/json");   
    header("Access-Control-Allow-Methods: GET");

    include ('config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $res = $config->fetchAllRecords();
        $data['data'] = $res;
    }
    else
    {
        $data['msg'] = "Only GET method is allowed.....";
    }

    echo json_encode($data);

?>