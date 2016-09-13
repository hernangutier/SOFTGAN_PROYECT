<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ConceptosOut */

$this->title = 'Create Conceptos Out';
$this->params['breadcrumbs'][] = ['label' => 'Conceptos Outs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conceptos-out-create">

  <div class="box box-success">
            <div class="box-header with-border">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
