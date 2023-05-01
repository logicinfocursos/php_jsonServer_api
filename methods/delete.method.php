<?php
function _delete($json, $body, $table, $key, $id)
{
    if ($json[$table]) {

        if ($id == "") {

            http_response_code(500);
            echo json_encode(
                [
                    "message" => 'erro: é necessário informar a chave para deletar o registro!',
                    "success" => false,
                ]
            );
            
        } else {

            $searchResult = findByKey($json[$table], $id, $key);

            if ($searchResult >= 0) {

                echo json_encode($json[$table][$searchResult]);
                unset($json[$table][$searchResult]);
                file_put_contents('db.json', json_encode($json));

            } else {
                http_response_code(500);
                echo json_encode(
                    [
                        "message" => 'erro: registro não encontrado...',
                        "success" => false,
                    ]
                );
            }
        }
    } else {

        http_response_code(500);
        echo json_encode(
            [
                "message" => 'erro: ocorreu um erro ao tentar realizar a consulta',
                "success" => false,
            ]
        );
    }
}