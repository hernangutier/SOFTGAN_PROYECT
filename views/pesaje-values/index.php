<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesajeValuesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plan de Pesaje Vivo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesaje-values-index">

    

    <p>
        <?= Html::a('Crear Plan de Pesaje', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'descripcion',
            [
                'attribute'=>'Tiempo de Pesaje',
                'value'=>'Tiempo',
            ],
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
