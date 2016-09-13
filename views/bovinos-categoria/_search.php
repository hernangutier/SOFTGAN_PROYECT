<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BovinosCategoriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bovinos-categoria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod') ?>

    <?= $form->field($model, 'sexo') ?>

    <?= $form->field($model, 'emin') ?>

    <?= $form->field($model, 'emax') ?>

    <?= $form->field($model, 'edescarte') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'isfutura')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
