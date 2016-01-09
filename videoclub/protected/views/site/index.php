<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- FORMULARIO BUSQUEDA -->
	<div class="row">
		<?php $form=$this->beginWidget("CActiveForm"); ?>
		    <div class="col-xs-8 col-xs-offset-2">
		        <div class="input-group">
		            <div class="input-group-btn search-panel">
		                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		                    <span id="search_concept">Filtrar por</span> <span class="caret"></span>
		                </button>
		                <ul class="dropdown-menu" role="menu">
		                  <li><a href="#titulo">Nombre</a></li>
		                  <li><a href="#agno">Año</a></li>
		                  <li><a href="#genero">Genero</a></li>
		                  <li><a href="#director">Director</a></li>
		                </ul>
		            </div>		            
		            <?php echo $form->textField($buscar,"value", array("class"=>"form-control", "placeholder"=>"Buscar pelicula...")); ?>
		            <?php echo $form->textField($buscar,"param", array("class"=>"form-control hidden")); ?>
		            <span class="input-group-btn">
		                <button type="submit" class="btn btn-default form-control"><span class="glyphicon glyphicon-search"></span></button>
		            </span>
		        </div>
		    </div>
	    <?php $this->endWidget();?>
	</div> <!-- FIN FORMULARIO BUSQUEDA -->

<!-- LISTA PELICULAS -->
<div class="row">
	<h1><?php echo $msg; ?></h1>
	<?php foreach ($peliculas as $p):?>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="well well-sm">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                                <img height="170" width="120" src="<?php echo $p->imagen; ?>" alt="Nature Portfolio"/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-8" data-id="{{ $flaite->id }}">
                    <h4>Titulo: <strong><?php echo $p->titulo; ?></strong></h4>
                    <p>
                    	<p>Director: <strong><?php echo $p->director->nombre; ?></strong></p>
                    	<p>Año: <strong><?php echo $p->agno;?></strong></p>
                    	<p>Genero: <strong><?php echo $p->genero->nombre;?></strong></p>
                    </p>
                </div>
            </div>
        </div>
    </div>
	<?php endforeach;?>
</div> <!-- FIN LISTA PELICULAS -->