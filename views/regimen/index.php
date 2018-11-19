<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegimenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regimens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regimen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Regimen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_regimen',
            'nombre_reg',
            'sigla_reg',
            'estado_reg',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
