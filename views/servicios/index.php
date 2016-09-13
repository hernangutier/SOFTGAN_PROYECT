<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiciosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Servicios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cod',
            'codbov',
            'programa_reproductivo',
            'status_fisiologico',
            'fecha_palpacion',
            // 'fecha_teorica_parto',
            // 'diagnostico_reproductivo',
            // 'diagnostico_general',
            // 'codinterv',
            // 'tipo',
            // 'codtoro',
            // 'status:boolean',
            // 'codvet',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
