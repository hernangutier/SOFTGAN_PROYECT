<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PalpacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Palpaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="palpaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Palpaciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cod',
            'codmadre',
            'tid',
            'status_fisiologico',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
