<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class employee extends BaseController
{
    public function employee()
    {
        $EmployeeModel = new \App\Models\EmployeeModel();


        $data['employee'] = $EmployeeModel->orderBy('fechaIngreso', 'DESC')->findAll();
     
        return view('employee/employee', $data);
    }


    public function guardaremployee(){

        if ($this->request->getMethod() == 'post') {
            $EmployeeModel = new \App\Models\EmployeeModel();
            $nickename=substr(ucfirst($this->request->getPost('nombre')),0,1).substr(ucfirst($this->request->getPost('apellidoPaterno')),0,1).ucfirst($this->request->getPost('apellidoMaterno'));
        

            $datos = [
                'nombre' => ucfirst($this->request->getPost('nombre')),
                'nickename' => $nickename,
                'apellidoPaterno' => ucfirst($this->request->getPost('apellidoPaterno')),
                'apellidoMaterno' => ucfirst($this->request->getPost('apellidoMaterno')),
                'fechanacimiento' => $this->request->getPost('fechanacimiento'),
                'telefono' => $this->request->getPost('telefono'),
                'foto' => $this->request->getPost('foto'),
                'correoElectronico' => $this->request->getPost('correoElectronico'),
                'tipo' => $this->request->getPost('tipo'),
                'contrasena' => $this->request->getPost('contrasena'),
                'estatus' => $this->request->getPost('estatus'),
            ];

            $resultado = $EmployeeModel->insert($datos);

          
            $to="todoromeroscleaning@gmail.com";
            $subject="prueba email todoromeros";
            $message="esta es la prueba de la pagina de Romeros";

             mail($to,$subject,$message);

            $data['employee'] = $EmployeeModel->orderBy('fechaIngreso', 'DESC')->findAll();
            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => $this->request->getVar('nombre') . ' ' . 'Se registro correctamente']);

            //return view('employee/employee',$data);
        } 
  
        else{
            return view('employee/employee');
            
        }
       

    }

    public function editaremployee($id)
    {

        $EmployeeModel = new \App\Models\EmployeeModel();
        $data['employee'] = $EmployeeModel->where('id', $id)->first();

      return view('employee/guardareditar', $data);

    }

        
    public function altaemployee(){

        return view('employee/guardareditar');

    }



    public function guardarEditar(){


        $db      = \Config\Database::connect();
        $EmployeeModel = new \App\Models\EmployeeModel();
        $id=$this->request->getPost('id');

           //Actualizamos en  tabla clientes
           $datos = [
           'nombre'=>  $this->request->getPost('nombre'),
           'apellidoPaterno'=>  $this->request->getPost('apellidoPaterno'),
           'apellidoMaterno'=>  $this->request->getPost('apellidoMaterno'),
           'fechanacimiento'=>  $this->request->getPost('fechanacimiento'),
           'telefono'=>  $this->request->getPost('telefono'),
           'correoElectronico'=>  $this->request->getPost('correoElectronico'),
           'foto'=>  $this->request->getPost('foto'),
           'tipo'=>  $this->request->getPost('tipo'),
           'estatus'=>  $this->request->getPost('estatus'),
           ];
           $resultado=$EmployeeModel->update($id, $datos);
         print($resultado);

           if ($resultado > 0) {
            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se a guardado satisfactoriamente '.$id.$this->request->getVar('nombre').'!']);
            return redirect()->to('employee');
        } else {
            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'fail'.$this->request->getVar('nombre').'!']);
        
            return redirect()->to('employee');
        }
       
       // return view('employee/guardareditar');

    }




    
}