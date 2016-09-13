<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use kartik\widgets\TouchSpin;
/* @var $this yii\web\View */
/* @var $model app\models\VentasLotes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ventas-lotes-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'ncontrol')->textInput() ?>

    <?= $form->field($model,'fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese Fecha de Facturación ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format'=>'yyyy-mm-dd',
    ]
    ])
    ?>



    <?=
    $form->field($model, 'codclient')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(app\models\Clientes::find()->asArray()->all(), 'cod', 'razon'),
          'options' => ['placeholder' => 'Seleccione el Cliente ...'],
          'pluginOptions' => [
              'allowClear' => true
          ],
        ]);
     ?>







    <?=
      $form->field($model, 'avg_peso')->widget(TouchSpin::classname(), [
    'options'=>['placeholder'=>'Indique el Peso Promedio'],
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

    <?= $form->field($model, 'precio_carne')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Siguiente' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
