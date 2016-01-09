<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoHora */

$this->title = 'Create Tipo Hora';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Horas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-hora-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
