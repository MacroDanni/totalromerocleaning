<?php

namespace App\Models;

use CodeIgniter\Model;

class FotosModel extends Model
{
	
	protected $table='fotos';
	protected $primaryKey='id';
	protected $allowedFields=['idordenworklist','nombre','descripcion','idworklist','estatus'];



	
}

?> 