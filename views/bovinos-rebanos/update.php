<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BovinosRebanos */

$this->title = 'Actualizar Rebaño: ' . ' ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Bovinos Rebanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-rebanos-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
