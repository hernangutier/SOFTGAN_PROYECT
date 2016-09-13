<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GruposToros */

$this->title = 'Crear Grupo de Toros';
$this->params['breadcrumbs'][] = ['label' => 'Grupos de Toros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupos-toros-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
