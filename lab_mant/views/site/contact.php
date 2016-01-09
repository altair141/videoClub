<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Gracias por contactarnos. Nos comunicaremos con usted lo más pronto posible.
        </div>

        <p>
            Note que si activa el depurador Yii, debería poder ver
            el mensaje de correo en el panel de correo en el depurador.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                YA que la aplicación está en modo de desarrollo, el correo no se envía, pero sí se guarda
                como un archivo bajo <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Por favor, configure la propiedad <code>useFileTransport</code> del componente
                de la aplicación <code>mail</code> para que sea falso para habiliar
                el envío de correos.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            Si tiene alguna consulta o duda, por favor llene el siguiente para contactarnos.
            Muchas gracias.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name') ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
