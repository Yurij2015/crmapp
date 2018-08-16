<?php
$db = require __DIR__. '/db.php';

return [
  'id' => 'crmapp',
  //'basePath' => realpath(__DIR__.'/../'),
  'basePath' => dirname(__DIR__),
  'components' => [
      'request' => [
          'cookieValidationKey' => 'secret',
          'enableCookieValidation' => false,
      ],
      'db' => $db,
      'urlManager' => [
          'enablePrettyUrl' => true,
          'showScriptName' => false,
      ],
  ],
  'aliases' => [
      '@bower' => '@vendor/bower-asset',
      '@npm'   => '@vendor/npm-asset',
  ],
];
