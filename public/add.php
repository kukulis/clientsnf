<?php

require __DIR__ . '/../vendor/autoload.php';

use Lt\Regitra\Exceptions\ValidationException;

$app = new \Lt\Regitra\Application();

try {
    $body = file_get_contents('php://input');
    $app->getController()->add($_REQUEST, $body);
} catch (ValidationException $e) {
    echo json_encode(['error' => $e->getMessage()]);
    http_response_code(400);
} catch (Exception|Error $e) {
    echo json_encode(['error' => $e->getMessage()]);
    http_response_code(500);
}

$app->finalize();
