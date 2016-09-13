<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Veterinarios */

$this->title = 'Actualizar Veterinario: ' . $model->cedula;
$this->params['breadcrumbs'][] = ['label' => 'Veterinarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veterinarios-update">

  <div class="box box-primary">
            <div class="box-header with-border">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
