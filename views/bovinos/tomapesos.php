<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\TouchSpin;

/* @var $this yii\web\View */
/* @var $model app\models\TomaPesos */

$this->title ='Registro de Toma de Pesos';
$this->params['breadcrumbs'][] = ['label' => 'Bovinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-pesos">

  <div class="box box-primary">
            <div class="box-header with-border">



    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'tpeso')->dropDownList(
        ArrayHelper::map(app\models\PesajeValues::find()->asArray()->all(), 'cod', 'descripcion'),

    [
        'id'=>'select-contact',
        'prompt'=>'Seleccione el Tipo de Peso',

    ]
    ); ?>

    <?=
      $form->field($model, 'ano')->widget(TouchSpin::classname(), [
    'options'=>['placeholder'=>'Seleccione el Año...'],
    'pluginOptions' => [
        'min' => 2010,
        'max' => 2100,
        'buttonup_class' => 'btn btn-primary',
        'buttondown_class' => 'btn btn-info',
        'buttonup_txt' => '<i class="glyphicon glyphicon-plus-sign"></i>',
        'buttondown_txt' => '<i class="glyphicon glyphicon-minus-sign"></i>'
    ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Siguiente' , ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

                  </div>
            </div>
</div>
