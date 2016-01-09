<?php

class Genero extends CActiveRecord
{
	/*
	* Indica el nombre de la tabla a ActiveRecord,
	* en este caso, la unica diferencia mayuscula.
	*/
	public function tableName()
	{
		return "genero";
	}

	/*
	* Declara relaciones entre tablas para mapeo
	*/
	public function relations()
    {
        return array(
            'pelicula'=>array(self::HAS_MANY, 'Pelicula', 'id_genero'),
        );
    }
}