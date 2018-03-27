<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model tina\html\models\Html */
?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'text')->widget(
    Yii::createObject([
        'class' => \krok\editor\interfaces\EditorInterface::class,
        'model' => $model,
        'attribute' => 'text',
    ])
)
?>

<?= $form->field($model, 'template')->dropDownList($model::getTemplates()) ?>

<?= $form->field($model, 'hidden')->dropDownList($model::getHiddenList()) ?>
