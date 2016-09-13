<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BovinosRazas */

$this->title = 'Actualizar Razas: ' . ' ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Razas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-razas-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
