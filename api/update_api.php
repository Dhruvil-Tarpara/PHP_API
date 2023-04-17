<?php

    header("Content-Type: application/json");   
    header("Access-Control-Allow-Methods: PUT,PATCH");
    
    include('config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH')
    {
        $input = file_get_contents("php://input");

        parse_str($input, $_UPDATE);
        $catagory = $_UPDATE['catagory'];
        $id = $_UPDATE['id'];

        $res = $config->update($catagory, $id);

        if($res)
        {
            $data['msg'] = "Category update successfully.....";
        }
        else
        {
            $data['msg'] = "Category updation failed .....";
        }
    }
    else
    {
        $data['msg'] = "Only put or patch method is allowed.....";
    }

    echo json_encode($data);

?>