<?php
    $conn = mysqli_connect("localhost", "root", "", "json");
    $sql = "SELECT * FROM wisata";
    $result = mysqli_query($conn, $sql);
    $json_array = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $json_array[] = $row;
    }

    echo json_encode($json_array);