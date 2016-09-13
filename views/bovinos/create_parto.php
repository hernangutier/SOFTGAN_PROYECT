<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */



$this->title ='Registro del Becerro (Paso 2 de 2)';
//$this->params['breadcrumbs'][] = ['label' => 'Atras', 'url' => [$url]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="bovinos-create">



    <?= $this->render('_form_parto', [
        'model' => $model,
    ]) ?>

</div>
