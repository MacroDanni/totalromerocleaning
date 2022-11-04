<?php

namespace App\Models;

use CodeIgniter\Model;
class EmpleadoModel extends Model
{
	
	protected $table='empleado';
	protected $primaryKey='id';
	protected $allowedFields=['nombre','apellidoPaterno','apellidoMaterno','edad','telefono','foto','correoElectronico','contrasena','fechaIngreso','tipo','estatus','eliminarEstatus'];
//	protected $allowedFields=['nombre','apellidoPaterno','apellidoMaterno','edad','telefono','foto','correoElectronico','contrasena','fechaIngreso','tipo','estatus','eliminarEstatus'];
}
 
?> 