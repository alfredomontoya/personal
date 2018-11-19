<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetalledocumentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalledocumentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalledocumento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detalledocumento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_detalledocumento',
            [
                'attribute' => 'id_tramite_dd',
                'value' => 'tramiteDd.numero_tra'
            ],
            'numero_dd',
            'fechadocumento_dd',
            'cantidad_dd',
            'orignal_dd',
            'copia_dd',
            'legalizado_dd',
            'fotocopia_dd',
            'estado_dd',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
