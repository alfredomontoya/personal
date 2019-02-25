<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Cambio */

$this->title = $model->id_cambio;
$this->params['breadcrumbs'][] = ['label' => 'Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cambio-view">
    <div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cambio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cambio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Cambio cargo</div>
                <div class="panel-body">
                    <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    ['label' => 'ID:', 'attribute' => 'id_cambio'],
                    ['label' => 'Id Policia:', 'attribute' => 'id_policia_cam'],
                    ['label' => 'Id Policia:', 'attribute' => 'tipo_cam'],
                    ['label' => 'Id Cargo', 'attribute' => 'id_cargo_cam'],
                    ['label' => 'Cargo:', 'attribute' => 'cargoCam.nombre_car'],
                    ['label' => 'Unidad:', 'attribute' => 'cargoCam.unidadCar.nombre_uni'],
                    ['label' => 'Departamento:', 'attribute' => 'cargoCam.unidadCar.comandoUni.nombre_com'],
                    ['label' => 'Fecha Designación:', 'attribute' => 'fdesignacion_cam'],
                    ['label' => 'Fecha Registro:', 'attribute' => 'fecha_cam'],
                    ['label' => 'Glosa:', 'attribute' => 'glosa_cam'],
                    ['label' => 'Estado:', 'attribute' => 'estado_cam'],
                ],
                'options' => [
                    'class' => 'table table-striped detail-view'
                ],
                'template' => "<tr><th class='text-right' width=200>{label}</th><td{contentOptions}>{value}</td></tr>"
            ]) ?>
                </div>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Datos policia</div>
                <div class="panel-body">
                    <?= DetailView::widget([
                'model' => $policia,
                'attributes' => [
                    ['label' => 'Escalafon:', 'attribute' => 'escalafon_pol'],
                    ['label' => 'CI:', 'attribute' => 'ci_pol'],
                    ['label' => 'Expedido:', 'attribute' => 'exp_pol'],
                    ['label' => 'Nombres', 'value' => $policia->nombre1_pol . ' ' .$policia->nombre2_pol . ' ' . $policia->paterno_pol,],
                    ['label' => 'Apellidos:', 'value' => $policia->paterno_pol . ' ' .$policia->materno_pol,],
                ],
                'options' => [
                    'class' => 'table table-striped detail-view'
                ],
                'template' => "<tr><th class='text-right' width=200>{label}</th><td{contentOptions}>{value}</td></tr>"
            ]) ?>
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel panel-heading">Historial de cambios</div>
                <div class="panel panel-body">
                    <div class="table-responsive">
                        
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id</th>
                                <th scope="col">id policia</th>
                                <th scope="col">id cargo</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">unidad</th>
                                <th scope="col">departamento</th>
                                <th scope="col">fecha</th>
                                <th scope="col">estado</th>
                          </tr>
                        </thead>
                        <tbody id="cambios">
                            <?php
                            $nro = 1;
                            foreach ($cambios as $i => $cambio) {
                                echo '<tr>';
                                echo '<td>'.$nro.'</td>';
                                echo '<td>'.$cambio->id_cambio.'</td>';
                                echo '<td>'.$cambio->id_policia_cam.'</td>';
                                echo '<td>'.$cambio->cargoCam->id_cargo.'</td>';
                                echo '<td>'.$cambio->cargoCam->nombre_car.'</td>';
                                echo '<td>'.$cambio->cargoCam->unidadCar->nombre_uni.'</td>';
                                echo '<td>'.$cambio->cargoCam->unidadCar->comandoUni->nombre_com.'</td>';
                                echo '<td>'.$cambio->fecha_cam.'</td>';
                                echo '<td>'.$cambio->estado_cam.'</td>';
                                echo '</tr>';
                                $nro++;
                            }?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>
