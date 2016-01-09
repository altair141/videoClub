<?php

/* @var $this yii\web\View */

$this->title = 'Gestor de laboratorio';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Gestor de Laboratorio clínico</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>RCE</h2>

                <p><a class="btn btn-default" href="/lab_mant/web/index.php?r=rce-examen">Clic aquí</a></p>
            </div>            
            <div class="col-lg-4">
                <h2>Reservas</h2>

                <p><a class="btn btn-default" href="/lab_mant/web/index.php?r=reserva">Clic aquí</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Horas</h2>

                <p><a class="btn btn-default" href="/lab_mant/web/index.php?r=hora">Clic aquí</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <h2>Personas</h2>

                <p><a class="btn btn-default" href="/lab_mant/web/index.php?r=persona">Clic aquí</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Tipo de Hora</h2>

                <p><a class="btn btn-default" href="/lab_mant/web/index.php?r=tipo-hora">Clic aquí</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Examen</h2>

                <p><a class="btn btn-default" href="/lab_mant/web/index.php?r=examen">Clic aquí</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Estado RCE Examen</h2>

                <p><a class="btn btn-default" href="/lab_mant/web/index.php?r=estado-rce-examen">Clic aquí</a></p>
            </div>
                        <div class="col-lg-4">
                <h2>Hora Examen Solicitado</h2>

                <p><a class="btn btn-default" href="/lab_mant/web/index.php?r=hora-examen-solicitado">Clic aquí</a></p>
            </div>
            
            <div class="col-lg-4">
                <h2>Procedencia</h2>

                <p><a class="btn btn-default" href="/lab_mant/web/index.php?r=procedencia">Clic aquí</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <h2>Forma de Pago</h2>

                <p><a class="btn btn-default" href="/lab_mant/web/index.php?r=forma-pago">Clic aquí</a></p>
            </div>
        </div>

    </div>
</div>
