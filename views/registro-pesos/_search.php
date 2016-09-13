<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegistroPesosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registro-pesos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codbov') ?>

    <?= $form->field($model, 'tpeso') ?>

    <?= $form->field($model, 'fecha_plan') ?>

    <?= $form->field($model, 'peso') ?>

    <?= $form->field($model, 'cod') ?>

    <?php // echo $form->field($model, 'fecha_real') ?>

    <?php // echo $form->field($model, 'gan_peso_dia') ?>

    <?php // echo $form->field($model, 'gan_peso_mes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
