<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FormaPago */

$this->title = 'Ingresar Forma Pago';
$this->params['breadcrumbs'][] = ['label' => 'Formas de Pago', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forma-pago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
