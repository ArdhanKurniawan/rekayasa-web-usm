<?php
    // JSON Encode & Decode
    
    $age = [
        "Peter" => 35,
        "Ben" => 37,
        "Joe" => 43
    ];

    echo json_encode($age);
    echo ("<br>");
    
    
    $cars = [
        "Volvo",
        "BMW",
        "Toyota",
    ];

    echo json_encode($cars);
    echo ("<br>");


    $json_obj = json_encode($age);
    $obj = json_decode($json_obj);
    echo $obj->Peter;
    echo ("<br>");
    echo $obj->Ben;
    echo ("<br>");
    echo $obj->Joe;