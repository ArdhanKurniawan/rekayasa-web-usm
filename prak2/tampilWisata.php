<?php
    function curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    $send = curl("http://localhost/rekayasa-web-usm/prak2/getWisata.php");

    $data = json_decode($send, true);

    // echo '<pre>' . var_export($data, true) . '</pre>';
    foreach ($data as $key => $row) {
        echo $row["id_wisata"] . "<br/>";
        echo $row["kota"] . "<br/>";
        echo $row["landmark"] . "<br/>";
        echo $row["tarif"] . "<hr/>";
    }