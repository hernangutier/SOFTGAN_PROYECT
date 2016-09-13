<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ConceptosOutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conceptos de Desincorporación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conceptos-out-index">

  <div class="box box-primary">
            <div class="box-header with-border">

    <p>
        <?= Html::a('Crear Concepto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
                return
                '<div class="panel panel-default">
                  <div class="panel-body">
                    <div class="user-panel">
                                <div class="pull-left image">
                                    <img src="images/ganado_engorda.png" class="img-circle" alt="User Image"/>
                                </div>
                                <div class="pull-left info">
                    <span class="badge">'.  0 .'</span>


                            </div>

                    </div>
                    <div>
                            <p class="list-group-item-text">'. $model->descripcion . '</p>' .




                    '</div>' .

                    '<div class="btn-group" role="group" aria-label="...">
                        <a  class="btn btn-danger" href='. Url::to(['grupos-toros/delete', 'id'=>$model->cod]) .'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                        <a  class="btn btn-primary"  href='. Url::to(['conceptos-out/update', 'id'=>$model->cod]) .' ><span class="glyphicon glyphicon-pencil" </span></a>
                    </div>

                  </div>
                </div>';



        },
    ]) ?>
</div>
</div>
</div>
