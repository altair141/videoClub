<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RceExamenExamen */

$this->title = 'Ingresar RCE Examen Examen';
$this->params['breadcrumbs'][] = ['label' => 'RCE Examen Exámenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rce-examen-examen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
