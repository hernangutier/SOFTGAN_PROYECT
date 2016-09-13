<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Veterinarios */

$this->title = 'Crear Veterinario';
$this->params['breadcrumbs'][] = ['label' => 'Veterinarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veterinarios-create">

  <div class="box box-success">
            <div class="box-header with-border">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
