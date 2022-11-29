<?php

namespace App\Models;

use CodeIgniter\Model;

class WorklistModel extends Model
{
	
	protected $table='worklist';
	protected $primaryKey='id';
	protected $allowedFields=['id_building','id_business','id_employee','id_service','nameservice','nameBuilding','nameBusiness','nameEmployee','status','fechaAseo','registrationdate','assigned'
	,'description','eliminarEstatus','numroom','dateagreetoclean','dateinprocesscleaning','cleaningfinished','datejobfinished'];

}

?> 