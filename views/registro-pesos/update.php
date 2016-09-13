<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RegistroPesos */

$this->title = 'Registrar Peso: ' . $model->tpeso0->descripcion;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registro-pesos-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
