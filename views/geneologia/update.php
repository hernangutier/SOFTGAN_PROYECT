<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Geneologia */

$this->title = 'Geneologia Bovinos: ' . $model->codhijo0->codbov;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geneologia-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
