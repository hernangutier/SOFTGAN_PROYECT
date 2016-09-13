<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Palpaciones */

$this->title = 'Update Palpaciones: ' . $model->cod;
$this->params['breadcrumbs'][] = ['label' => 'Palpaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod, 'url' => ['view', 'id' => $model->cod]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="palpaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
