<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\TouchSpin;

/* @var $this yii\web\View */
/* @var $model app\models\PesajeValues */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesaje-values-form">

  

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= $form->field($model, 'tipo_pesaje')->dropDownList(
                    ['0'=>'en Dias','1'=>'en Meses',
                    '2'=>'en Años']
                    )
                    ?>
    <?=
      $form->field($model, 'max_dias')->widget(TouchSpin::classname(), [
    'options'=>['placeholder'=>'Seleccione el Maximo...'],
    'pluginOptions' => [
        'min' => 0,
        'max' => 360,
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
