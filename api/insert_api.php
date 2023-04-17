<?php

    header("Content-Type: application/json");   
    header("Access-Control-Allow-Methods: POST");
    
    include('config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $catagory = $_POST['catagory'];

        $res = $config->insert($catagory);

        if($res)
        {
            $data['msg'] = "Category insertion successfully.....";
        }
        else
        {
            $data['msg'] = "Category insertion failed .....";
        }
    }
    else
    {
        $data['msg'] = "Only post method is allowed.....";
    }

    echo json_encode($data);

?>