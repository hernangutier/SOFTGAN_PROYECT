<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PalpacionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="palpaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod') ?>

    <?= $form->field($model, 'codmadre') ?>

    <?= $form->field($model, 'tid') ?>

    <?= $form->field($model, 'status_fisiologico') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
