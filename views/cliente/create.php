<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Registrar Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-create">

    <div class="panel panel-primary">
        
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
        </div>
        
        <div class="panel-body">
            <div class="cliente-form">
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->render('_form', ['model' => $model,]) ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="panel-footer">
            @mc Derechos Reservados
        </div>
        
      </div>

</div>
