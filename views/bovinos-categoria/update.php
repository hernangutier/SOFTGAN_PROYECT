<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BovinosCategoria */

$this->title = 'Actualizar Categoria: ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-categoria-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
