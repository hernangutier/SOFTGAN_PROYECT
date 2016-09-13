<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Clientes */

$this->title = 'Crear Cliente o Comprador';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-create">

  <div class="box box-success">
            <div class="box-header with-border">
              <div class="box-header with-border">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
