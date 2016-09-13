<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use kartik\widgets\TouchSpin;
use kartik\money\MaskMoney;
/* @var $this yii\web\View */
/* @var $model app\models\Desincorporaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desincorporaciones-form">

    <?php $form = ActiveForm::begin(); ?>





    <?= $form->field($model,'fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese  Fecha ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format'=>'yyyy-mm-dd',
        ]
        ])

    ?>

    <?= $form->field($model, 'codtipo')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\models\ConceptosOut::find()->all(), 'cod', 'descripcion')
                  ]);
     ?>

     <?=
       $form->field($model, 'peso')->widget(TouchSpin::classname(), [
     'options'=>['placeholder'=>'Indique el Peso Actual...'],
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

     <?= $form->field($model, 'costo_carne')->widget(MaskMoney::classname(), [
    'pluginOptions' => [


        'allowNegative' => false
        ]
    ]); ?>

    <?= $form->field($model,'observaciones')->textArea(['rows' => 6]) ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Procesar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
