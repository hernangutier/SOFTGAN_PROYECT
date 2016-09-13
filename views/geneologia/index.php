<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GeneologiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Geneologias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geneologia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Geneologia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cod',
            'codhijo',
            'codmadre',
            'codpadre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
