<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \Lt\Regitra\Application();

try {
    $body = file_get_contents('php://input');
    $app->getController()->add($_REQUEST, $body);
} catch (Exception|Error $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$app->finalize();
