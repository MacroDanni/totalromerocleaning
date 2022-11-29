<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkStatusModel extends Model
{
	
	protected $table='workstatus';
	protected $primaryKey='id';
	protected $allowedFields=['id_worklist','id_employee','date','status','description'];

}

 
?> 