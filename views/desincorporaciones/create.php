<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Desincorporaciones */

$this->title = 'Desincorporar Bovino: ' . $model->codbov0->codbov  ;
$this->params['breadcrumbs'][] = ['label' => 'Desincorporaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desincorporaciones-create">

  <div class="box box-success">
            <div class="box-header with-border">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>
  </div>
</div>
