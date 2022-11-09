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


    public function guardarEmpleado(){

        if ($this->request->getMethod() == 'post') {
            $EmpleadoModel = new \App\Models\EmpleadoModel();

            $datos = [
                'nombre' => $this->request->getPost('nombre'),
                'apellidoPaterno' => $this->request->getPost('apellidoPaterno'),
                'apellidoMaterno' => $this->request->getPost('apellidoMaterno'),
                'edad' => $this->request->getPost('edad'),
                'telefono' => $this->request->getPost('telefono'),
                'foto' => $this->request->getPost('foto'),
                'correoElectronico' => $this->request->getPost('correoElectronico'),
                'tipo' => $this->request->getPost('tipo'),
                'contrasena' => $this->request->getPost('contrasena'),
                'estatus' => $this->request->getPost('estatus'),
            ];

            $resultado = $EmpleadoModel->insert($datos);

          
            $to="todoromeroscleaning@gmail.com";
            $subject="prueba email todoromeros";
            $message="esta es la prueba de la pagina de Romeros";

             mail($to,$subject,$message);

            $data['empleado'] = $EmpleadoModel->orderBy('fechaIngreso', 'DESC')->findAll();
            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => $this->request->getVar('nombre') . ' ' . 'Se registro correctamente']);

            return view('empleado/empleado',$data);
        } 
  
        else{
            return view('empleado/empleado');
            
        }
       

    }

    public function editarEmpleado($id)
    {

        $EmpleadoModel = new \App\Models\EmpleadoModel();
        $data['empleado'] = $EmpleadoModel->where('id', $id)->first();

      return view('empleado/guardareditar', $data);

    }

        
    public function altaempleado(){

        return view('empleado/guardareditar');

    }



    public function guardarEditar(){


        $db      = \Config\Database::connect();
        $EmpleadoModel = new \App\Models\EmpleadoModel();
        $id=$this->request->getPost('id');

           //Actualizamos en  tabla clientes
           $datos = [
           'nombre'=>  $this->request->getPost('nombre'),
           'apellidoPaterno'=>  $this->request->getPost('apellidoPaterno'),
           'apellidoMaterno'=>  $this->request->getPost('apellidoMaterno'),
           'edad'=>  $this->request->getPost('edad'),
           'telefono'=>  $this->request->getPost('telefono'),
           'correoElectronico'=>  $this->request->getPost('correoElectronico'),
           'foto'=>  $this->request->getPost('foto'),
           'tipo'=>  $this->request->getPost('tipo'),
           'estatus'=>  $this->request->getPost('estatus'),
           ];
           $resultado=$EmpleadoModel->update($id, $datos);
         print($resultado);

           if ($resultado > 0) {
            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se a guardado satisfactoriamente '.$id.$this->request->getVar('nombre').'!']);
            return redirect()->to('empleado');
        } else {
            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'fail'.$this->request->getVar('nombre').'!']);
        
            return redirect()->to('empleado');
        }
       
       // return view('empleado/guardareditar');

    }


    
}