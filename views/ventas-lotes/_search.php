<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VentasLotesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ventas-lotes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod') ?>

    <?= $form->field($model, 'codclient') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'avg_peso') ?>

    <?= $form->field($model, 'precio_carne') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'ncontrol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
