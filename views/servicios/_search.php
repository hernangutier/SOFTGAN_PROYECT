<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServiciosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod') ?>

    <?= $form->field($model, 'codbov') ?>

    <?= $form->field($model, 'programa_reproductivo') ?>

    <?= $form->field($model, 'status_fisiologico') ?>

    <?= $form->field($model, 'fecha_palpacion') ?>

    <?php // echo $form->field($model, 'fecha_confirmacion') ?>

    <?php // echo $form->field($model, 'diagnostico_reproductivo') ?>

    <?php // echo $form->field($model, 'diagnostico_general') ?>

    <?php // echo $form->field($model, 'codinterv') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'codtoro') ?>

    <?php // echo $form->field($model, 'status')->checkbox() ?>

    <?php // echo $form->field($model, 'codvet') ?>

    <?php // echo $form->field($model, 'efectivo')->checkbox() ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'result_servicio') ?>

    <?php // echo $form->field($model, 'status_servicio') ?>

    <?php // echo $form->field($model, 'status_parto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
