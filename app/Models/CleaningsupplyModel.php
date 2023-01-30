<?php

namespace App\Models;
use CodeIgniter\Model;

class CleaningsupplyModel extends Model
{
	
	protected $table='cleaningsupply';
	protected $primaryKey='id';
	protected $allowedFields=['nombre','tipo','nickname','fechasolicitud','fecharegistro','estatus','estatusproceso'];

}
?> 