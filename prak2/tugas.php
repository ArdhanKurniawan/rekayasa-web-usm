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

    $data = json_decode($send);
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>KOTA</th>
                <th>LANDMARK</th>
                <th>TARIF</th>
            </tr>

            <?php foreach ($data as $key => $value) { ?>
                <tr>
                    <td><?= $value->kota ?></td>
                    <td><?= $value->landmark ?></td>
                    <td><?= $value->tarif ?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>