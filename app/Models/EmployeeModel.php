<?php

namespace App\Models;

use CodeIgniter\Model;
class EmployeeModel extends Model
{
	
	protected $table='employee';
	protected $primaryKey='id';
	protected $allowedFields=['nombre','apellidoPaterno','apellidoMaterno','fechanacimiento','telefono','foto','correoElectronico','contrasena','fechaIngreso','tipo','estatus','eliminarEstatus','nickename','statuspassword'];

}
 
?> 