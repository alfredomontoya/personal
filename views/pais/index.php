<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pais-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pais', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pais',
            'codigoalf2_pais',
            'codigoalf3_pais',
            'codigonum_pais',
            'nombre_pais',
            //'descripcion_pais',
            //'estado_pais',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
