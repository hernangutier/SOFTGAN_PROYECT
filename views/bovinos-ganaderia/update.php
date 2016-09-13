<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BovinosGanaderia */

$this->title = 'Actualizar Tipo de Ganaderia: ' . ' ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Ganaderia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-ganaderia-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
