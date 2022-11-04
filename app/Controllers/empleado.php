<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Empleado extends BaseController
{
    public function empleado()
    {
        $EmpleadoModel = new \App\Models\EmpleadoModel();
        $data['empleado'] = $EmpleadoModel->orderBy('fechaIngreso', 'DESC')->findAll();

       

        return view('empleado/empleado', $data);
    }

    public function altaEmpleado(){
        return view('empleado/altaEmpleado');

    }

    
}