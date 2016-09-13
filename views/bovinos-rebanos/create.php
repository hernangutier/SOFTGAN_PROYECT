<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BovinosRebanos */

$this->title = 'Crear Rebaño';
$this->params['breadcrumbs'][] = ['label' => 'Bovinos Rebanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-rebanos-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
