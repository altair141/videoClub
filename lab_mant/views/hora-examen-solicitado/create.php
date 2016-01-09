<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HoraExamenSolicitado */

$this->title = 'Ingresar Hora Examen Solicitado';
$this->params['breadcrumbs'][] = ['label' => 'Horas Exámenes Solicitados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hora-examen-solicitado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
