<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$file = 'data.json';

if (file_exists($file)) {
    $content = file_get_contents($file);
    $hash = md5($content); 
    
    echo json_encode([
        "hash" => $hash,
        "data" => json_decode($content)
    ]);
} else {
    echo json_encode(["hash" => "", "data" => []]);
}

?>
