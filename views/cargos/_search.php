<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CargosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'coduser') ?>

    <?= $form->field($model, 'codprov') ?>

    <?= $form->field($model, 'ntrans') ?>

    <?php // echo $form->field($model, 'ffact') ?>

    <?php // echo $form->field($model, 'nfact') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
