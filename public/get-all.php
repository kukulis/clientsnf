<?php
require __DIR__ . '/../vendor/autoload.php';

$app = new \Lt\Regitra\Application();

$app->getController()->getAll($_REQUEST);

$app->finalize();