<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PesajeValues */

$this->title = 'Actualizar Plan de Pesaje: ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Plan de Pesaje', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pesaje-values-update">

  <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
