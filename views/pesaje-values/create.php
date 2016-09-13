<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PesajeValues */

$this->title = 'Crear Plan de Pesaje';
$this->params['breadcrumbs'][] = ['label' => 'Plan de Pesaje', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesaje-values-create">

  <div class="box box-success">

            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
