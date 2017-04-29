<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
        /*
          'formatter' => [
          'class' => 'yii\i18n\Formatter',
          'booleanFormat' => ['<span class="glyphicon glyphicon-remove"></span> no', '<span class="glyphicon glyphicon-ok"></span> Yes'],
          ],
         * 
         */
];
