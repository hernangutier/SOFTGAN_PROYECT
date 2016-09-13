<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\TouchSpin;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\BovinosCategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bovinos-categoria-form">

    <?php $form = ActiveForm::begin(); ?>
    

  <div class="user-panel">
            <div class="pull-left image">
                <img src="images/ganado_engorda.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <span class="badge"><?= $model->getCount() ?></span>

                
            </div>
        </div>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'sexo')->dropDownList(
                    ['H'=>'Hembra','M'=>'Macho',
                    'A'=>'Ambos Sexos',]
                    )
    ?> 

    


    <?=
      $form->field($model, 'emin')->widget(TouchSpin::classname(), [
    'options'=>['placeholder'=>'Seleccione el Año...'],
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

    <?=
      $form->field($model, 'emax')->widget(TouchSpin::classname(), [
    'options'=>['placeholder'=>'Seleccione el Año...'],
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

    <?=
    $form->field($model, 'edescarte')->widget(TouchSpin::classname(), [
    'options'=>['placeholder'=>'Seleccione el Año...'],
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
    <?=
      $form->field($model, 'ind_reproduccion')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'success',
                'offColor' => 'danger',
                'onText' => 'Si',
                'offText' => 'No',
            ]

        ]);
    ?>

    <?=
      $form->field($model, 'isfutura')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'success',
                'offColor' => 'danger',
                'onText' => 'Si',
                'offText' => 'No',
            ]

        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
