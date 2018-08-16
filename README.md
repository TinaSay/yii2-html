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
            'class' => \tina\html\Module::class,
            'viewPath' => '@tina/html/views/backend',
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
            '@tina/html/migrations',
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
                        'update',
                ],
            ],
        ],
    ],
```

common:

```
    'modules' => [
        'html' => [
            'class' => \tina\html\Module::class,
            'templates' => [
                'default' => 'Default',
            ],
        ],
    ]
```

Use:
----

```
    <?= HtmlWidget::widget([
        'name' => 'custom',
    ]); ?>
```
