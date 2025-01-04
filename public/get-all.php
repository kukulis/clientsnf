<?php
require __DIR__ . '/../vendor/autoload.php';

$app = new \Lt\Regitra\Application();
try {
    $app->getController()->getAll($_REQUEST);
} catch (Exception|Error $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$app->finalize();