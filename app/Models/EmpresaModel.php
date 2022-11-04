<?php

namespace App\Models;

use CodeIgniter\Model;
class ProcesodoModel extends Model
{
	
	protected $table='proceso';
	protected $primaryKey='id';
	protected $allowedFields=['id_edificio','id_empresa','id_empleado','estatus','fechaAseo','fechaRegistro','asignado','descripcion','tipoAseo','EliminarEstatus'];

}
 
?> 