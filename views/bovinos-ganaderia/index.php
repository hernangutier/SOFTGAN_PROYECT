<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BovinosGanaderiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo de Ganaderias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-ganaderia-index">

    

    <p>
        <?= Html::a('Crear Tipo de Ganaderia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
