<?php

namespace App\Models;

use CodeIgniter\Model;

class Requirementcleaningsupply extends Model
{
	
	protected $table='requirementcleaningsupply';
	protected $primaryKey='id';
	protected $allowedFields=['nameproduct','kind','employee','daterequirement','status'];

}
 
?> 