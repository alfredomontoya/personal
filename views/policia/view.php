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
    <div class="container">
        
    
        <h1> Policia: <?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Aceptar', ['index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Nuevo policia', ['create'], ['class' => 'btn btn-success']) ?>

        </p>
        <div class="panel panel-primary">
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
                                //['label' => 'Trabajó en Santa Cruz?:', 'attribute' => 'trabajosantacruz_pol'],
                                ['label' => 'Dirección:', 'attribute' => 'direccion_pol'],
                                ['label' => 'Estado:', 'attribute' => 'estado_pol'],
                            ],
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <?php 
                             foreach ($imagenpolicia as $row){
                                 echo '<div class="col-sm-6 col-md-4">';
                                 echo Html::a(
                                         Html::img((!is_null($row->namefile_imp))? $row->namefile_imp : '/policias/default.jpg' , ['class' => 'img-fluid']) ,
                                         (!is_null($row->namefile_imp))? $row->namefile_imp : '/policias/default.jpg' 
                                         );
                                 echo '</div>';
                             }
                            ?>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
