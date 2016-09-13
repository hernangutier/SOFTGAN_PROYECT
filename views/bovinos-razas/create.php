<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BovinosRazas */

$this->title = 'Crear Raza';
$this->params['breadcrumbs'][] = ['label' => 'Razas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-razas-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
