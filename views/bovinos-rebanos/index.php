<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BovinosRebanosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bovinos Rebaños o Lotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-rebanos-index">




    <p>
        <?= Html::a('Crear Rebaño', ['create'], ['class' => 'btn btn-success']) ?>
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
                    <span class="badge">'.  $model->getCount() .'</span>


                            </div>

                    </div>
                    <div>
                            <p class="list-group-item-text">'. $model->descripcion . '</p>
                    </div>

                    <div class="btn-group" role="group" aria-label="...">
                        <a  class="btn btn-danger" href='. Url::to(['bovinos-rebanos/delete', 'id'=>$model->cod]) .'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                        <a  class="btn btn-primary"  href='. Url::to(['bovinos-rebanos/update', 'id'=>$model->cod]) .' ><span class="glyphicon glyphicon-pencil" </span></a>
                    </div>

                  </div>
                </div>';



        },
 ]) ?>

</div>
