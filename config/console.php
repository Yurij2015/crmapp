<?php
$db = require __DIR__. '/db.php';

return [
    'id' => 'crmapp-console',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => $db,
        'authManager' => [
            'class' => \yii\rbac\DbManager::class,
            'defaultRoles' => ['guest'],
        ],
    ],
];
