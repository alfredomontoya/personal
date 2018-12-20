<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetallegradoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detallegrados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallegrado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detallegrado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_detallegrado',
            //'id_policia_dg',
            //'id_grado_dg',
            //['header' => 'Escalafón',   'attribute' => 'escalafon_pol', 'value' => 'policiaDg.escalafon_pol'],
            ['header' => 'CI',          'attribute' => 'ci_pol', 'value' => 'policiaDg.ci_pol'],
            ['header' => 'Ap. paterno', 'attribute' => 'paterno_pol', 'value' => 'policiaDg.paterno_pol'],
            ['header' => 'Ap. paterno', 'attribute' => 'materno_pol', 'value' => 'policiaDg.materno_pol'],
            ['header' => 'Ap. paterno', 'attribute' => 'nombre1_pol', 'value' => 'policiaDg.nombre1_pol'],
            ['header' => 'Ap. paterno', 'attribute' => 'nombre2_pol', 'value' => 'policiaDg.nombre2_pol'],
            //'policiaDg.ci_pol',
            'gradoDg.descripcion_gra',
            //'glosa_dg',
            //'fechaascenso_dg',
            //'fecha_dg',
            'estado_dg',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>
</div>
