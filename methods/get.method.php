<?php
function _get($json, $body, $table, $key, $id)
{
    if ($json[$table]) {

        if (!isset($key) || $key == "") {

            echo json_encode($json[$table]);

        } else {

            $searchResult = findByKey($json[$table], $id, $key);

            if ($searchResult >= 0) {

                echo json_encode($json[$table][$searchResult]);

            } else {

                http_response_code(500);
                echo json_encode(
                    [
                        "message" => 'erro: ocorreu um erro',
                        "success" => false,
                    ]
                );
            }
        }
    } else {

        echo '[]';
        
    }
}