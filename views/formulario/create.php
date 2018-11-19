<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Formulario */

$this->title = 'Create Formulario';
$this->params['breadcrumbs'][] = ['label' => 'Formularios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formulario-create">
    <div  class="panel panel-primary">
        <div class="panel-heading">
            <h1><?= Html::encode($this->title) ?></h1>	
        </div>

        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>

        <div class="panel-footer">
                    
        </div>

</div>
</div>
