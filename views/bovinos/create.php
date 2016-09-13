<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */

$this->title ='Registrar Bovino';
$this->params['breadcrumbs'][] = ['label' => 'Bovinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="bovinos-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
