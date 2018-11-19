<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detallegrado */

$this->title = 'Create Detallegrado';
$this->params['breadcrumbs'][] = ['label' => 'Detallegrados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallegrado-create">
	
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
        
        <div class="panel-footer">
            @sistemas
        </div>
    </div>
    

    

</div>
