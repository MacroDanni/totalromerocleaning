<?php

namespace App\Models;

use CodeIgniter\Model;

class WorklistimagenesModel extends Model
{
	
	protected $table='worklistimagenes';
	protected $primaryKey='id';
	protected $allowedFields=['nombre','nickname','fecha','descripcion','idTrabajo'];

}

?> 