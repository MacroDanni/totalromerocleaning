<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdenworklistModel extends Model
{
	
	protected $table='ordenworklist';
	protected $primaryKey='id';
	protected $allowedFields=['idworklist','estatus','fecha','estatusfoto'];

}

?> 