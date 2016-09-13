<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\grid\GridExportAsset;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use app\models\Bovinos;
use kartik\export\ExportMenu;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BovinosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registro General de Bovinos';
$this->params['breadcrumbs'][] = $this->title;
?>


</body>
  <div class="bovinos">
    <div class="box box-primary">
              <div class="box-header with-border">
                <p>
                    <?= Html::a('Crear Bovino', ['create'], ['class' => 'btn btn-success']) ?>

                </p>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form">
                <div class="box-body">







    <?php Pjax::begin(['id' => 'bovinos']) ?>
    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],


        [
            'attribute'=>'codbov',
            'label'=>'N° de Bovino',
            'vAlign'=>'middle',
            'width'=>'250px',
            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->codbov,
                    ['view1','id'=>$searchModel->cod],
                    ['title'=>'Ver Datos del Bovino' ]);
            },
            /*
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Bovinos::find()->where(['status'=>true])->orderBy('codbov')->asArray()->all(), 'cod', 'codbov'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Filtrar Bovino'],
            */
            'format'=>'raw'
        ],

        [
            'attribute'=>'Sexo',
            'value'=>'sexo',
            'filter' => Html::activeDropDownList($searchModel,
            'sexo', ArrayHelper::map([['cod'=>'H','descripcion'=>'Hembra'],
                        ['cod'=>'M','descripcion'=>'Macho']],
                        'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Sexo']),
        ],

        [
            'attribute'=>'Tipo de Ganaderia',
            'value'=>'tipo',
            'filter' => Html::activeDropDownList($searchModel,
            'codganaderia', ArrayHelper::map(app\models\TipoGanaderia::getTipos(),
            'id', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar Tipo de Ganaderia']),
        ],

        [
            'attribute'=>'Categoria Actual',
            'value'=>'codcatActual.descripcion',
            'filter' => Html::activeDropDownList($searchModel,
            'codcat_actual', ArrayHelper::map(app\models\BovinosCategoria::find()->asArray()->all(),
            'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar Categoria Actual']),
        ],

        [
            'attribute'=>'Rebaño o Lote',
            'value'=>'codrebano0.descripcion',
            'filter' => Html::activeDropDownList($searchModel,
            'codrebano', ArrayHelper::map(app\models\BovinosRebanos::find()->asArray()->all(),
            'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Rebaño o Lote']),
        ],
        [
            'attribute'=>'Raza',
            'value'=>'codraza0.descripcion',
            'filter' => Html::activeDropDownList($searchModel,
            'codraza', ArrayHelper::map(app\models\BovinosRazas::find()->asArray()->all(),
            'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Raza']),
        ],

        [
            'attribute'=>'Edad Aproximada',
            'value'=>'Edad',
        ],


        ['class' => 'yii\grid\ActionColumn','template' => '{update}{delete}',]
    ];

    echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
    ]);
     ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover'=>true,

        'columns' => $gridColumns,
    ]); ?>
    <?php Pjax::end() ?>
</div>

</div>
</div>
