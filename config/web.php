<?php
$db = require __DIR__. '/db.php';

return [
  'id' => 'crmapp',
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
      'view' => [
          'renderers' => [
              'md' => [
                  'class' => 'app\utilities\MarkdownRenderer',
              ]
          ],
          'theme' => [
              'class' => yii\base\Theme::class,
              'basePath' => '@app/themes/snowy',
          ],
      ],
      'response' => [
          'formatters' => [
              'yaml' => [
                  'class' => 'app\utilities\YamlResponseFormatter',
              ],
          ],
      ],
  ],
  'modules' => [
      'gii' => [
          'class' => 'yii\gii\Module',
          'allowedIPs' => ['*'],
      ]
  ],
  'aliases' => [
      '@bower' => '@vendor/bower-asset',
      '@npm'   => '@vendor/npm-asset',
  ],
  'extensions' => require(__DIR__.'/../vendor/yiisoft/extensions.php'),
];
