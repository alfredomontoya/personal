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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_policia',
            'escalafon_pol',
            'expescalafon_pol',
            'ci_pol',
            'exp_pol',
            'paterno_pol',
            'materno_pol',
            'esposo_pol',
            'nombre1_pol',
            'nombre2_pol',
            'sexo_pol',
            'fnacimiento_pol',
            'dptonacimiento_pol',
            'provnacimiento_pol',
            'locanacimiento_pol',
            'fincorporacion_pol',
            'telefono_pol',
            'telefonoref_pol',
            'fpresentacion_pol',
            'trabajosantacruz_pol',
            'direccion_pol',
            'estado_pol',
        ],
    ]) ?>

</div>
