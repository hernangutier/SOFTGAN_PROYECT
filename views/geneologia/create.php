<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Geneologia */

$this->title = 'Registrar Geneologia del Bovino: ' . $model->codhijo0->codbov ;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geneologia-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
