<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RegistroPesos */

$this->title = 'Registro Pesos';
$this->params['breadcrumbs'][] = ['label' => 'Registro Pesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registro-pesos-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
