Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist contrib/yii2-html "*"
```

or add

```
"contrib/yii2-html": "*"
```

to the require section of your `composer.json` file.

Configure
---------

backend:

```
    'modules' => [
        'html' => [
            'class' => 'tina\html\Module',
            'viewPath' => '@vendor/contrib/yii2-html/views/backend',
            'controllerNamespace' => 'tina\html\controllers\backend',
        ],
    ],
```

params:

```
'menu' => [
        [
            'label' => 'Html',
            'url' => ['/html/html'],
        ],
    ],
```

console:

```
        'migrate' => [
            'class' => \yii\console\controllers\MigrateController::class,
            'migrationTable' => '{{%migration}}',
            'interactive' => false,
            'migrationPath' => [
                '@vendor/contrib/yii2-html/migrations',
            ],
        ],
```

...

```
            'config' => [
                [
                    'name' => 'html',
                    'controllers' => [
                        'html' => [
                            'index',
                            'view',
                            'create',
                            'update',
                            'delete',
                        ],
                    ],
                ],
            ],
```

use:

```
    <?= HtmlWidget::widget([
        'name' => 'custom',
    ]); ?>
```
