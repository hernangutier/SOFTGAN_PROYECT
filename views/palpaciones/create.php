<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Palpaciones */

$this->title = 'Create Palpaciones';
$this->params['breadcrumbs'][] = ['label' => 'Palpaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="palpaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
