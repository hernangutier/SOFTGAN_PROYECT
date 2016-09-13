<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VentasLotes */

$this->title = 'Aperturar Nueva Venta por Lote';
$this->params['breadcrumbs'][] = ['label' => 'Ventas Lotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventas-lotes-create">

  <div class="box box-success">
            <div class="box-header with-border">
              <div class="box-header with-border">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
