<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiciosModel extends Model
{
	
	protected $table='services';
	protected $primaryKey='id';
	protected $allowedFields=['name','description','costousuario','costoreal','tiempotrabajo'];

}

 
?> 