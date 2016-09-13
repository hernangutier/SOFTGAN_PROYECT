<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Servicios */

$this->title = 'Registrar Perdida o Inefectividad del Servicio';
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

    <?= $form->field($model, 'result_servicio')->dropDownList(
                    ['2'=>'Aborto',
                     '3'=>'Infertibilidad no Definida',

                    ]
                    )


    ?>

    <?= $form->field($model,'observaciones')->textArea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Procesar', ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
</div>
</div>
