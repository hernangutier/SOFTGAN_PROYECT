<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Servicios */

$this->title = 'Informar Preñez';
$this->params['breadcrumbs'][] = ['label' => 'Bovinos Madres', 'url' => ['bovinos/index-madres']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicios-create">
  <div class="box box-success">
            <div class="box-header with-border">
              <div class="box-header with-border">
                <div class="row">
                      <h3 class="box-title">N° de Bovino: <code> <?= $model->codbov0->codbov ?> </code>  </h3>
                </div>
                <div class="row">
                      <h3 class="box-title">Programa Reproductivo: <code> <?= $model->codbov0->getProgramaReproductivo() ?> </code>  </h3>
                </div>

              </div>



    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'fecha_confirmacion')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese Fecha de Confirmación ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format'=>'yyyy-mm-dd',
    ]
    ])
    ?>
    <?= $form->field($model, 'diagnostico_general')->textInput() ?>
    <?= $form->field($model,'diagnostico_reproductivo')->textArea(['rows' => 6]) ?>
    <?= $form->field($model, 'status_fisiologico')->dropDownList(
                    ['2'=>'Preñada',
                    '3'=>'Preñada con Cria',
                    ]

                  )


    ?>
    <?php echo $form->field($model, 'codinterv')->dropDownList(
       ArrayHelper::map(app\models\IntervalosPrenez::find()->asArray()->all(), 'cod', 'descripcion'),

    [
       'id'=>'select-rebano',
       'prompt'=>'Seleccione la Valoración de Preñez',

    ]
    ); ?>


    <div class="form-group">
        <?= Html::submitButton('Procesar', ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
</div>
</div>
