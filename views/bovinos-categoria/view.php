<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */
/* @var $model app\models\BovinosCategoria */

$this->title = $model->cod;
$this->params['breadcrumbs'][] = ['label' => 'Bovinos Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-categoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cod], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cod], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cod',
            'sexo',
            
            'emin',
            'emax',
            'edescarte',
            'descripcion',
        ],
    ]) ?>

    <?= ChartJs::widget([
    'type' => 'Bar',
    'options' => [
        'height' => 400,
        'width' => 400
    ],
    'data' => [
        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
        'datasets' => [
            [
                'fillColor' => "rgba(220,220,220,0.5)",
                'strokeColor' => "rgba(220,220,220,1)",
                'pointColor' => "rgba(220,220,220,1)",
                'pointStrokeColor' => "#fff",
                'data' => [65, 59, 90, 81, 56, 55, 40]
            ],
            [
                'fillColor' => "rgba(151,187,205,0.5)",
                'strokeColor' => "rgba(151,187,205,1)",
                'pointColor' => "rgba(151,187,205,1)",
                'pointStrokeColor' => "#fff",
                'data' => [28, 48, 40, 19, 96, 27, 100]
            ]
        ]
    ]
]);
?>

</div>
