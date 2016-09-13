<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */

$this->title = 'Actualizar Bovino: ' . $model->codbov;
$this->params['breadcrumbs'][] = ['label' => 'Bovinos', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
