<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Policia */

$this->title = $model->id_policia;
$this->params['breadcrumbs'][] = ['label' => 'Policias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="policia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_policia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_policia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="panel panel-info">
        <div class="panel-heading">Datos policia</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            ['label' => 'ID:', 'attribute' => 'id_policia'],
                            ['label' => 'Escalafón:', 'attribute' => 'escalafon_pol'],
                            ['label' => 'Exp. escalafón:', 'attribute' => 'expescalafon_pol'],
                            ['label' => 'CI:', 'attribute' => 'ci_pol'],
                            ['label' => 'Exp. ci:', 'attribute' => 'exp_pol'],
                            ['label' => 'Ap. Paterno:', 'attribute' => 'paterno_pol'],
                            ['label' => 'Ap. Materno:', 'attribute' => 'materno_pol'],
                            ['label' => 'Ap. Esposo:', 'attribute' => 'esposo_pol'],
                            ['label' => 'Primer nombre:', 'attribute' => 'nombre1_pol'],
                            ['label' => 'Segundo nombre:', 'attribute' => 'nombre2_pol'],
                            ['label' => 'Sexo:', 'attribute' => 'sexo_pol'],
                            ['label' => 'Fecha nacimiento:', 'attribute' => 'fnacimiento_pol'],
                            ['label' => 'Departamento nac:', 'attribute' => 'dptonacimiento_pol'],
                            ['label' => 'Provincia nac.:', 'attribute' => 'provnacimiento_pol'],
                            ['label' => 'Localidad nac:', 'attribute' => 'locanacimiento_pol'],
                            ['label' => 'Fecha de incoporación:', 'attribute' => 'fincorporacion_pol'],
                            ['label' => 'Teléfono:', 'attribute' => 'telefono_pol'],
                            ['label' => 'Teléfono de referencia:', 'attribute' => 'telefonoref_pol'],
                            ['label' => 'Trabajó en Santa Cruz?:', 'attribute' => 'trabajosantacruz_pol'],
                            ['label' => 'Dirección:', 'attribute' => 'direccion_pol'],
                            ['label' => 'Estado:', 'attribute' => 'estado_pol'],
                        ],
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">Foto</div>
                        <div class="panel-body">
                            <?= Html::img('@web/policias/'.$model->id_policia.'_foto.jpg', ['alt'=>'some', 'class'=>'thing', 'width' => '200']);?> 
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    
    
    <div class="panel panel-info">
        <div class="panel-heading">Historial de grados</div>
        <div class="panel-body">
            <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Id</th>
              <th scope="col">id_policia</th>
              <th scope="col">id_grado</th>
              <th scope="col">codigo</th>
              <th scope="col">grado</th>
              <th scope="col">fecha</th>
              <th scope="col">estado</th>
            </tr>
          </thead>
          <tbody>
              <?php 
              $nro = 1;
              foreach ($detallegrado as $i => $detalle) : ?>
                <tr>
                    <td><?= $nro ?> </td>
                    <td><?= $detalle->id_detallegrado ?> </td>
                    <td><?= $detalle->id_policia_dg ?> </td>
                    <td><?= $detalle->id_grado_dg ?> </td>
                    <td><?= $detalle->gradoDg->codigo_gra ?> </td>
                    <td><?= $detalle->gradoDg->descripcion_gra ?> </td>
                    <td><?= $detalle->fecha_dg ?> </td>
                    <td><?= $detalle->estado_dg ?> </td>
                    <?php $nro++; ?>
                </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
        </div>
    </div>
    
    
</div>
