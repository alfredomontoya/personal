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
                    ['label' => 'Fecha Registro', 'attribute' => 'fecha_cam'],
                    ['label' => 'Estado:', 'attribute' => 'estado_cam'],
                ],
            ]) ?>
        </div>
    </div>
    4826cia
    
    
    <div class="panel panel-info">
        <div class="panel-heading">
            Datos Policia
        </div>    
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody id="cambios">
                                
                                <tr>
                                    <td>
                                        Escalafon
                                    </td>
                                    <td>
                                        <?= $policia->escalafon_pol . ' ' . $policia->expescalafon_pol ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        CI
                                    </td>
                                    <td>
                                        <?= $policia->ci_pol . ' ' . $policia->exp_pol ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nombre completo
                                    </td>
                                    <td>
                                        <?= $policia->paterno_pol . ' ' . $policia->materno_pol . ' ' . $policia->nombre1_pol . ' ' . $policia->nombre2_pol ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Grado
                                    </td>
                                    <td>
                                        <?= $detallegrado->gradoDg->descripcion_gra ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
