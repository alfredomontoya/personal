<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReceiptdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receiptdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receiptdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Receiptdetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'receipt_id',
            'item_name',
            'descripcion',
            'opcion1',
            //'opcion2',
            //'opcion3',
            //'opcion4',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
