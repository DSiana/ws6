<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!empty($data)) {
    if (file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
        http_response_code(200);
        echo json_encode(["message" => "Дані успішно збережено."]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Помилка запису файлу."]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "Дані відсутні."]);
}

?>
