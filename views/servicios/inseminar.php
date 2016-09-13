<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Servicios */

$this->title = 'Registrar Servicio de Inseminación';
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



    <?= $this->render('_form_inseminar', [
        'model' => $model,
    ]) ?>
</div>
</div>
</div>
