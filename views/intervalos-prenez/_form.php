<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\TouchSpin;
/* @var $this yii\web\View */
/* @var $model app\models\IntervalosPrenez */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="intervalos-prenez-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
    <?=
      $form->field($model, 'vmin')->widget(TouchSpin::classname(), [
    'options'=>['placeholder'=>'Minimo en Meses'],
    'pluginOptions' => [
        'min' => 0,
        'max' => 1100,
        'buttonup_class' => 'btn btn-primary',
        'buttondown_class' => 'btn btn-info',
        'buttonup_txt' => '<i class="glyphicon glyphicon-plus-sign"></i>',
        'buttondown_txt' => '<i class="glyphicon glyphicon-minus-sign"></i>'
    ]
    ]);
    ?>

    <?=
      $form->field($model, 'vmax')->widget(TouchSpin::classname(), [
    'options'=>['placeholder'=>'Maximo en Meses'],
    'pluginOptions' => [
        'min' => 0,
        'max' => 1100,
        'buttonup_class' => 'btn btn-primary',
        'buttondown_class' => 'btn btn-info',
        'buttonup_txt' => '<i class="glyphicon glyphicon-plus-sign"></i>',
        'buttondown_txt' => '<i class="glyphicon glyphicon-minus-sign"></i>'
    ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
