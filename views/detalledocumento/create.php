<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detalledocumento */

$this->title = 'Create Detalledocumento';
$this->params['breadcrumbs'][] = ['label' => 'Detalledocumentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalledocumento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
