<?php
function findByKey($vector, $id, $key){

    $searchResult = -1;

    foreach ($vector as $index => $obj) {

        if ($obj[$key] == $id) {
            $searchResult = $index;
            break;
        }

    }

    return $searchResult;
}