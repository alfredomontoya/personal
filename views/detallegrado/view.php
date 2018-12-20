<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Detallegrado */

$this->title = $model->id_detallegrado;
$this->params['breadcrumbs'][] = ['label' => 'Detallegrados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallegrado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_detallegrado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_detallegrado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="panel panel-info">
        <div class="panel-heading"> Datos ascenso grado</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            ['label' => 'ID:', 'attribute' => 'id_detallegrado'],
                            ['label' => 'Policia:', 'value' => $model->policiaDg->paterno_pol . ' '. $model->policiaDg->materno_pol . ' '. $model->policiaDg->nombre1_pol . ' '. $model->policiaDg->nombre2_pol],
                            ['label' => 'Codigo grado:', 'value' => 'gradoDg.codigo_gra'],
                            ['label' => 'Grado:', 'attribute' => 'gradoDg.descripcion_gra'],
                            ['label' => 'Glosa:', 'attribute' => 'glosa_dg'],
                            ['label' => 'Fecha ascenso:', 'attribute' => 'fechaascenso_dg'],
                            ['label' => 'Fecha registro:', 'attribute' => 'fecha_dg'],
                            ['label' => 'Estado:', 'attribute' => 'estado_dg'],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    
    
    

</div>
