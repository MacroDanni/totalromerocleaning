<?php

namespace App\Models;

use CodeIgniter\Model;
class EdificioModel extends Model
{
	
	protected $table='edificio';
	protected $primaryKey='id';
	protected $allowedFields=['nombre','direccion','telefono','contacto','numeroHabitacion','eliminarEstatus'];

}
 
?> 