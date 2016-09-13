<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Servicios */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="servicios-create">




    <address>
      <strong>Datos del Servicio</strong><br>
      Programa Reproductivo: <code> Temporada de Monta </code><br>
      Veterinario: <?= $model->codvet0->nombre ?><br>
      Telefono: <?= $model->codvet0->telefono ?><br>
      Email: <?= $model->codvet0->email ?>
    </address>


    <?= $form->field($model, 'result_servicio')->dropDownList(
                    ['0'=>'Parto Normal',
                     '1'=>'Parto con Problemas',

                    ]
                  )


    ?>
    <?= $form->field($model,'observaciones')->textArea(['rows' => 6]) ?>












</div>
