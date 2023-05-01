<?php function _routes($method, $json, $body, $table, $key, $id)
{

    if ($method === 'GET')
        _get($json, $body, $table, $key, $id);
    else if ($method === 'POST')
        _post($json, $body, $table);
    else if ($method === 'PUT')
        _put($json, $body, $table, $key, $id);
    else if ($method === 'DELETE')
        _delete($json, $body, $table, $key, $id);

}