<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidades comando: ';// . $searchModel->comandoUni->nombre_com;
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a('Create Unidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id Comando</th>
                        <th>Unidad</th>
                        <th>Cargos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $nro = 1;
                    foreach ($dataProvider as $i => $row) {
                        echo "<tr>";
                        echo "<td>". $nro . "</td>";
                        echo "<td>". $row->id_comando_uni . "</td>";
                        echo "<td>". $row->nombre_uni . "</td>";
                        echo "<td>". count($row->cargosUni) . "</td>";
                        echo "</tr>";
                        $nro++;
                    }
                    ?>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            
        </div>
    </div>
    

    
    <?php
    /*GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre_uni',
            'cargosCount',
            //'cargos',
            
            //'id_comando_uni',
            //[ 'label' => 'Comando','attribute' => 'id_comando_uni','value' => 'comandoUni.nombre_com'],

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
    
</div>
