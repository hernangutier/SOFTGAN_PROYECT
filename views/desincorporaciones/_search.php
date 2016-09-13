<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desincorporaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod') ?>

    <?= $form->field($model, 'codbov') ?>

    <?= $form->field($model, 'fregistro') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'peso') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'codcat') ?>

    <?php // echo $form->field($model, 'costo_carne') ?>

    <?php // echo $form->field($model, 'codtipo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
