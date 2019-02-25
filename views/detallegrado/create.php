<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detallegrado */

$this->title = 'Registrar Grado Policia';
$this->params['breadcrumbs'][] = ['label' => 'Detallegrados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallegrado-create">
            <?= $this->render('_form', [
                'model' => $model,
                'policia' => $policia,
                'policias' => $policias,
                'grado' => $grado,
                'lgrados' => $lgrados,
            ]) ?>
</div>
