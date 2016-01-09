<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bitacora */

$this->title = 'Ingresar Bitácora';
$this->params['breadcrumbs'][] = ['label' => 'Bitácoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bitacora-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
