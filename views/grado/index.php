<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GradoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Grado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_grado',
            'codigo_gra',
            'descripcion_gra',
            'tipo_gra',
            'estado_gra',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
