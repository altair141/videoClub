<?php

class BuscarPeliculaForm extends CFormModel
{
	/*
	* valor a buscar
	*/
	public $value;

	/*
	* parametro por el cual buscar
	* por defecto busca por titulo de la pelicula
	*/
	public $param = 'titulo';

	/*
	* Reglas de validacion del formulario
	*/
	public function rules()
	{
	  	return array(
	    	array('value,param','required'),
	    	);
	}

}