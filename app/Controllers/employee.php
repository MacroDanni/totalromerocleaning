<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class employee extends BaseController
{
    public function employee()
    {
        $session = \Config\Services::session();
        if (!$session->id) {
            
        $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
        return redirect()->to('/');
        }
        $EmployeeModel = new \App\Models\EmployeeModel();
        $data['employee'] = $EmployeeModel->orderBy('fechaIngreso', 'DESC')->findAll();
     
        return view('employee/employee', $data);
    }

 



    public function guardaremployee(){

        $session = \Config\Services::session();
        if (!$session->id) {
            
        $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
        return redirect()->to('/');
        }

        if ($this->request->getMethod() == 'post') {
            $EmployeeModel = new \App\Models\EmployeeModel();
            $nickename=substr(ucfirst($this->request->getPost('nombre')),0,1).substr(ucfirst($this->request->getPost('apellidoPaterno')),0,1).ucfirst($this->request->getPost('apellidoMaterno'));
        
            $key = "";
            $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
            $max = strlen($pattern)-1;
            for($i = 0; $i < 8; $i++){
                $key .= substr($pattern, mt_rand(0,$max), 1);
            }
        

            $datos = [
                'nombre' => ucfirst($this->request->getPost('nombre')),
                'apellidoPaterno' => ucfirst($this->request->getPost('apellidoPaterno')),
                'apellidoMaterno' => ucfirst($this->request->getPost('apellidoMaterno')),
                'fechanacimiento' => $this->request->getPost('fechanacimiento'),
                'telefono' => $this->request->getPost('telefono'),
                'correoElectronico' => $this->request->getPost('correoElectronico'),
                'tipo' => $this->request->getPost('tipo'),
                'contrasena' => $key,
                'estatus' => $this->request->getPost('estatus'),
                'statuspassword' => '0',
            ];

            $resultado = $EmployeeModel->insert($datos);

            $newRecord = [
                'nickename'=>  $nickename.$EmployeeModel->getInsertID(),
                ];
            $resultado2=$EmployeeModel->update($EmployeeModel->getInsertID(), $newRecord);

            $to=$this->request->getPost('correoElectronico');
            $subject='Nueva Cuenta Creada!';
            $message='<h2>Cuenta nueva en Total Romeros Cleaning</h2>
            <DIV>Hola '.$nickename.$EmployeeModel->getInsertID().' , por favor de modificar la contraseña temporal por una clave personal.</DIV>
            <br>
            Email: '. $this->request->getPost('correoElectronico').'<br>
            Password(temp): <h3>'.$key.'</h3>
            <br>
            <a href="http://totalromeroscleaning.com/" ?>Inicia sesion aqui!</a>
            ';
        
            $email = \Config\Services::email();
            $email->setTo($to);
            $email->setFrom('notification@totalromeroscleaning.com', 'Notification - TotalRomerosCleaning');
            
            $email->setSubject($subject);
            $email->setMessage($message);
            $respuesta=$email->send();


            if($respuesta==1){
                
           
            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => $nickename.$EmployeeModel->getInsertID(). ' ' . 'Se registro correctamente']);
            return redirect()->to('employee');       

            }
            else{
            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se mando la clave por email']);
            return redirect()->to('employee'); 
            }
        } 
  
        else{
            return redirect()->to('employee');       
            
        }
       

    }

    public function editaremployee($id)
    {

        $session = \Config\Services::session();
        if (!$session->id) {
            
        $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
        return redirect()->to('/');
        }
        $EmployeeModel = new \App\Models\EmployeeModel();
        $data['employee'] = $EmployeeModel->where('id', $id)->first();

      return view('employee/guardareditar', $data);

    }

        
    public function altaemployee(){

        $session = \Config\Services::session();
        if (!$session->id) {
            
        $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
        return redirect()->to('/');
        }
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
           'tipo'=>  $this->request->getPost('tipo'),
           'estatus'=>  $this->request->getPost('estatus'),
           ];
           $resultado=$EmployeeModel->update($id, $datos);
        

           if ($resultado > 0) {
            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se a guardado satisfactoriamente '.$id.$this->request->getVar('nombre').'!']);
            return redirect()->to('employee');
        } else {
            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'fail'.$this->request->getVar('nombre').'!']);
        
            return redirect()->to('employee');
        }
       
       // return view('employee/guardareditar');

    }

    public function delete($id){
        $db      = \Config\Database::connect();
        $EmployeeModel = new \App\Models\EmployeeModel();
        

        $resultado=$EmployeeModel->delete(['id' => $id]);



        if ($resultado > 0) {
            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se a eliminado satisfactoriamente ']);
            return redirect()->to('employee');
        } else {
            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'Error, no se pudo eliminar, contactar al administrador']);
        
            return redirect()->to('employee');
        }
      
    }

public function resetpassword($id){


 
    $session = \Config\Services::session();
    $EmployeeModel = new \App\Models\EmployeeModel();
    $key = "";
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
    $max = strlen($pattern)-1;
    for($i = 0; $i < 8; $i++){
        $key .= substr($pattern, mt_rand(0,$max), 1);
    }

    $resultado=$EmployeeModel->update($id, [
        'contrasena'=>  $key,
        'statuspassword'=>'0'
        ]);

  
        if ($resultado == 1) {
        
            $data = $EmployeeModel->where('id', $id)->first();
            
            $to=$data['correoElectronico'];
            $subject='Password Restablecido.';


            $message='<h2>Restabler contraseña de Total Romeros Cleaning</h2>
            <DIV>Hola '.$data['nickename'].' , por favor inglesa la contraseña que se muestra mas adelante con este mismo correo.</DIV>
            <br>
            Email: '. $data['correoElectronico'].'<br>
            Password(temp): <h3>'.$key.'</h3>
            <br>
            una vez que coloque la nueva contraseña,le mostrara una ventana donde tiene que cambiar la contraseña.
            Gracias y excelente dia! 
            <br> <br>
            <a class="btn btn-success" href="http://totalromeroscleaning.com/" ?> Inicia sesion aqui!</a>
            ';
        
            $email = \Config\Services::email();
            $email->setTo($to);
            $email->setFrom('notification@totalromeroscleaning.com', 'Notification - TotalRomerosCleaning');
            
            $email->setSubject($subject);
            $email->setMessage($message);
            $respuesta=$email->send();


            if($respuesta==1){
                
           
            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => $data['nickename']. ', ' . 'Se mando la nueva clave al usuario']);
            return redirect()->to('employee');       

            }
            else{
            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se mando la clave por email, vuelve a restablecerlo por favor.']);
            return redirect()->to('employee'); 
            }
        }

}


    
}