<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IntervalosPrenez */

$this->title = 'Create Intervalos Prenez';
$this->params['breadcrumbs'][] = ['label' => 'Intervalos Prenezs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervalos-prenez-create">

  <div class="box box-success">
      <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
</div>
