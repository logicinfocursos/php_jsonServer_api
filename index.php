<?php

include_once('methods/findById.method.php');
include_once('routes.php');
include_once('methods/get.method.php');
include_once('methods/post.method.php');
include_once('methods/put.method.php');
include_once('methods/delete.method.php');

header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
date_default_timezone_set("America/Sao_Paulo");

$dbJsonPath = 'db.json'; // dbjson que conterá o "banco de dados"
$contents = file_get_contents($dbJsonPath);
$json = json_decode($contents, true);

// formatos da query string de pesquisa:
// localhost:8001/api/products
// localhost:8001/api/products?id=1682877466&key=code

$method = $_SERVER['REQUEST_METHOD'];
$parameters = explode('/', $_SERVER['REQUEST_URI']);

$id = isset($_GET["id"]) ? $_GET["id"] : null;

$key = isset($_GET["key"]) ? $_GET["key"] : "id";
$key = isset($id) ? $key : null;

$querystring = isset($parameters) && isset($parameters[2]) ? trim(strtolower($parameters[2])) : null;

$table = substr($querystring,0,strpos($querystring, '?'));
$table = !isset($table) || $table === "" ? $querystring : $table;

$body = file_get_contents('php://input');

_routes($method, $json, $body, $table, $key, $id);




