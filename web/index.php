<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
// Enable framework
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

ini_set('display_errors', true);

// Get config
$config = require(__DIR__ . '/../config/web.php');

// Create and launch application
(new yii\web\Application($config))->run();
