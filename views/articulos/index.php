<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticulosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maestro de Articulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulos-index">

    

    <p>
        <?= Html::a('Crear Articulo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'codigo',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{update}{delete}',
             ],
        ],
    ]); ?>
</div>
