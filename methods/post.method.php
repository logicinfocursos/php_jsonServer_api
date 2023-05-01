<?php
function _post($json, $body, $table)
{
    $jsonBody = json_decode($body, true);
    $jsonBody['id'] = time();

    if (!$json[$table]) {
        $json[$table] = [];
    }

    $json[$table][] = $jsonBody;
    echo json_encode($jsonBody);
    file_put_contents('db.json', json_encode($json));
}