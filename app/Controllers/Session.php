<?php

namespace App\Controllers;

class Session extends BaseController
{


    public function session()
    {

        if ($this->request->getMethod() == 'post') {

        $session = session();
        $EmployeeModel = new \App\Models\EmployeeModel();
        $email= $this->request->getPost('email');

        $password=$this->request->getPost('password');
         $query  =$EmployeeModel->where('correoelectronico', $email)->first();
          
        if($query){
            $pass = $query['contrasena'];

             if($password==$pass){
                $WorklistModel = new \App\Models\WorklistModel();
                $session_data = [
                    'id' => $query['id'],
                    'nikename' => $query['nikename'],
                    'name' => $query['nombre'],
                    'apellidoPaterno' => $query['apellidoPaterno'],
                    'apellidoMaterno' => $query['apellidoMaterno'],
                    'correoElectronico' => $query['correoElectronico'],
                    'isLoggedIn' => TRUE
                ];
                 
                $session->set($session_data);
               
                
                $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Welcome: '.$query['nombre'].' '.$query['apellidoPaterno'].' '.$query['apellidoMaterno']]);
                return redirect()->to('dashboard');
                //return view('dashboard/dashboard',$data);
               // echo  json_encode($query);
             }
             $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'The User Email or Password does not match, check with Admin']);
             return redirect()->to('/');
        }
        else{
            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'The User Email or Password does not match, check with Admin']);
            return redirect()->to('/');
        }
       

        

        }//final de if post


       
    }

    public function logout(){
        $session = session();
        $session_destroy;
        $session_data = [
            'id' => "",
            'nikename' => "",
            'name' => "",
            'apellidoPaterno' => "",
            'apellidoMaterno' => "",
            'correoElectronico' => "",
            'isLoggedIn' => FALSE
        ];
         
        $session->set($session_data);

        $this->session->setFlashdata('flag', ['type' => 'primary', 'msg' => "Log Out Success"]);
        return redirect()->to('/');
        
    }

}
