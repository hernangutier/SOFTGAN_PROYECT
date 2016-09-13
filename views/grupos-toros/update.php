<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GruposToros */

$this->title = 'Actualizar Grupo de Toros: ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Grupos de Toros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupos-toros-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
