<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Imagenes */

$this->title = 'Create Imagenes';
$this->params['breadcrumbs'][] = ['label' => 'Imagenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagenes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //'imagen' => $imagen,
    ]) ?>

</div>
