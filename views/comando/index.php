<?php

use app\models\Unidad;
use app\models\Cargo;

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ComandoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comandos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comando-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comando', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model, $key, $index, $column){
                    return kartik\grid\GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column){
                    //$searchModel = new \app\models\UnidadSearch();
                    //$searchModel->id_unidad = $model->id_unidad_com;
                    //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    /*
                    $searchModel = new app\models\UnidadSearch();
                    $searchModel->id_comando_uni = $model->id_comando;

                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);*/

                 
                    /*$query = Unidad::find()
                            ->select([
                                '{{unidad}}.nombre_uni',
                                'COUNT({{cargo}}.id_cargo) as cargosCount'
                                ])
                            ->joinWith('cargosUni')
                            ->where(['id_comando_uni' => $model->id_comando])
                            ->groupBy(['{{unidad}}.nombre_uni'])->all();*/
                    
                    $query = Unidad::find()->where(['id_comando_uni' => $model->id_comando])->orderBy(['nombre_uni'=>SORT_ASC])->all();
                            
                    //$query = Post::find()->where(['status' => 1]);
                    /*
                    $dataProvider = new ActiveDataProvider([
                        'query' => $query,
                        'pagination' => [
                            'pageSize' => 10,
                        ],
                        /*'sort' => [
                            'defaultOrder' => [
                                'nombre_uni' => SORT_ASC,
                            ]
                        ],
                    ]);
**/
                    return Yii::$app->controller->renderPartial('_unidades', [
                        'dataProvider' => $query,
                        //'dataProvider' => $dataProvider,
                    ]);

                },
            ],
            'id_comando',
            'codigo_com',
            'nombre_com',
            'unidadesCount'

        ],
    ]); ?>
    
</div>
