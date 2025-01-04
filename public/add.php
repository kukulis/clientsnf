<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \Lt\Regitra\Application();

$app->getController()->add($_REQUEST);

$app->finalize();
