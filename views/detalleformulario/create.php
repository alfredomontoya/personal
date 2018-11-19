<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detalleformulario */

$this->title = 'Create Detalleformulario';
$this->params['breadcrumbs'][] = ['label' => 'Detalleformularios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleformulario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelformulariosearch' => $modelformulariosearch,
        'modeltramitesearch' => $modeltramitesearch,
        'dataformulario' => $dataformulario,
        'datatramite' => $datatramite,
        'tramite' => $tramite,
            'formulario' => $formulario,
    ]) ?>

</div>
