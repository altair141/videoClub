<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Examen */

$this->title = 'Ingresar Examen';
$this->params['breadcrumbs'][] = ['label' => 'Exámenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
