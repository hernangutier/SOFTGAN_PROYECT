<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BovinosColores */

$this->title = 'Actualizar Color: ' . $model->cod;
$this->params['breadcrumbs'][] = ['label' => 'Bovinos Colores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-colores-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
