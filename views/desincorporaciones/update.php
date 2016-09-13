<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Desincorporaciones */

$this->title = 'Actualizar Desincorporacion: ' . $model->cod;
$this->params['breadcrumbs'][] = ['label' => 'Desincorporaciones', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="desincorporaciones-update">

  <div class="box box-primary">
            <div class="box-header with-border">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
</div>
