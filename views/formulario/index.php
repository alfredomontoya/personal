<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormularioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formularios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formulario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Formulario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_formulario',
            'nombre_form',
            'sigla_form',
            'estado_form',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
