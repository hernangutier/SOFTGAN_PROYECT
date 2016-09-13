<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IntervalosPrenez */

$this->title = 'Actualizar Intervalo Prenez: ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Intervalos de Preñez', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="intervalos-prenez-update">

  <div class="box box-primary">
      <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
</div>
