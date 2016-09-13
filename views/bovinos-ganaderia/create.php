<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BovinosGanaderia */

$this->title = 'Crear Tipo de Ganaderia';
$this->params['breadcrumbs'][] = ['label' => 'Tipo de Ganaderias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-ganaderia-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
