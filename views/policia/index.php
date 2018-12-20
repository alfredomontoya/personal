<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PoliciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Policias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="policia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Policia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_policia',
            //'escalafon_pol',
            //'expescalafon_pol',
            'ci_pol',
            'exp_pol',
            'paterno_pol',
            'materno_pol',
            //'esposo_pol',
            'nombre1_pol',
            'nombre2_pol',
            'sexo_pol',
            //'fnacimiento_pol',
            //'dptonacimiento_pol',
            //'provnacimiento_pol',
            //'locanacimiento_pol',
            //'fincorporacion_pol',
            //'telefono_pol',
            //'telefonoref_pol',
            //'fpresentacion_pol',
            //'trabajosantacruz_pol',
            //'direccion_pol',
            //'estado_pol',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>
</div>
