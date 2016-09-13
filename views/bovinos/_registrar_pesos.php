<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BovinosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registro de Pesos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registr-pesos">

    
 <?
    //------- Configuracion del dataprovider ----
    $totalCount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM posts WHERE publish=:publish', [':publish' => 1])
02
                ->queryScalar(); 
 ?>
    
    <?php Pjax::begin(['id' => 'bovinos']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'codbov',
            
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

            // 'codraza',
            // 'codganaderia',
            // 'codcat_actual',
            // 'codcat_ingreso',
            // 'codcat_futura',
            // 'foto',
            // 'codrebano',
            // 'status:boolean',
            // 'tipo_ingreso',
            // 'fingreso',
            // 'peso_nacer',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>
