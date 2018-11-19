<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tramite */

$this->title = $model->id_tramite;
$this->params['breadcrumbs'][] = ['label' => 'Tramites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tramite-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tramite], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tramite], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tramite',
            'id_usuario_tra',
            'id_cliente_tra',
            'numero_tra',
            'aduana_tra',
            'procedencia_tra',
            'proveedor_tra',
            'cantidadbultos_tra',
            'referencia_tra',
            'peso_tra',
            'regimen_tra',
            'tipocambio_tra',
            'mercancia_tra',
            'docembarque_tra',
            'partidaarancelaria_tra',
            'valorfob_tra',
            'fletes_tra',
            'seguro_tra',
            'otrosgastos_tra',
            'valorcifsus_tra',
            'valorcifbs_tra',
            'estado_tra',
            'glosa_tra',
            'fecha_tra',
        ],
    ]) ?>
    
    <div class="panel panel-primary">
        <div class="panel panel-heading"><?=$msgdd?></div>
            <div class="panel panel-body">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Id Tramite</th>
                        <th>Documento</th>
                        <th>Numero Doc.</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Original</th>
                        <th>Copia</th>
                        <th>Legalizado</th>
                        <th>Fotocopia</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($modelDetails as $i => $modelDetail) : ?>
                            <tr>
                                <td><?= $modelDetail->id_detalledocumento ?> </td>
                                <td><?= $modelDetail->id_tramite_dd ?> </td>
                                <td><?= $modelDetail->documento_dd ?> </td>
                                <td><?= $modelDetail->numero_dd ?> </td>
                                <td><?= $modelDetail->fechadocumento_dd ?> </td>
                                <td><?= $modelDetail->cantidad_dd ?> </td>
                                <td><?= Html::activeCheckbox($modelDetail, 'orignal_dd', ['label'=>'', 'disabled'=>true]) ?> </td>
                                <td><?= Html::activeCheckbox($modelDetail, 'copia_dd', ['label'=>'' , 'disabled'=>true]) ?> </td>
                                <td><?= Html::activeCheckbox($modelDetail, 'legalizado_dd', ['label'=>'', 'disabled'=>true]) ?> </td>
                                <td><?= Html::activeCheckbox($modelDetail, 'fotocopia_dd', ['label'=>'', 'disabled'=>true]) ?> </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                
            </div>
        </div>
    
        <div class="panel panel-primary">
        <div class="panel panel-heading"><?= $msgdf?></div>
            <div class="panel panel-body">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Id Tramite</th>
                        <th>Id Formulario</th>
                        <th>Nombre Formulario</th>
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detalleformularios as $i => $detalle) : ?>
                            <tr>
                                <td><?= $detalle->id_detalleformulario ?> </td>
                                <td><?= $detalle->id_tramite_df ?> </td>
                                <td><?= $detalle->id_formulario_df ?> </td>
                                <td><?= $detalle->formularioDf->nombre_form ?> </td>
                                <td><?= $detalle->fecha_df ?> </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                
            </div>
        </div>
    
        <div class="row">
                    
            <div class="col col-md-12">
                <?= Html::a('Inicio', ['/tramite/index'], ['class'=>'btn btn-info']) ?>
                <?= Html::a('Nuevo', ['/tramite/create'], ['class'=>'btn btn-success']) ?>
            </div>

        </div>

</div>
