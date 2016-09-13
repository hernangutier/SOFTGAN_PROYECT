<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cargos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'coduser')->textInput() ?>

    <?= $form->field($model, 'codprov')->textInput() ?>

    <?= $form->field($model, 'ntrans')->textInput() ?>

    <?= $form->field($model, 'ffact')->textInput() ?>

    <?= $form->field($model, 'nfact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
