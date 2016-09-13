<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */

$this->title = 'Actualizar Cliente: ' . $model->ced;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod, 'url' => ['view', 'id' => $model->cod]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-update">

  <div class="box box-primary">
            <div class="box-header with-border">
              <div class="box-header with-border">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
