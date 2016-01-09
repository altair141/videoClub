<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadoRceExamen */

$this->title = 'Ingresar Estado Rce Examen';
$this->params['breadcrumbs'][] = ['label' => 'Estados RCE Examen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-rce-examen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
