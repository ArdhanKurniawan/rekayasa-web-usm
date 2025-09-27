<?php 
    $backend_languange = [
        "a" => "PHP",
        "b" => "Python",
        "c" => "Java"
    ];
    
    $backend_languange_json = json_encode($backend_languange);
    echo $backend_languange_json;
    echo "<br>";



    $decode_object = json_decode($backend_languange_json);
    $decode_array = json_decode($backend_languange_json, true);


    var_dump($decode_object);
    echo "<br>";
    echo $decode_object->a;
    echo "<br>";
    echo $decode_object->b;
    echo "<br>";
    echo $decode_object->c;
    echo "<br>";

    var_dump($decode_array);
    echo "<br>";
    echo $decode_array['a'];
    echo "<br>";
    echo $decode_array['b'];
    echo "<br>";
    echo $decode_array['c'];