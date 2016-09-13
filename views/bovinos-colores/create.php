<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BovinosColores */

$this->title = 'Crear Color';
$this->params['breadcrumbs'][] = ['label' => 'Bovinos Colores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-colores-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
