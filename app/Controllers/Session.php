<?php

namespace App\Controllers;

class Session extends BaseController
{


    public function session()
    {

        if ($this->request->getMethod() == 'post') {

        $session = session()->startSession;
        $session = session();
        $session->set([]);
        $EmployeeModel = new \App\Models\EmployeeModel();
        $email= $this->request->getPost('email');

        $password=$this->request->getPost('password');
        $query  =$EmployeeModel->where('correoelectronico', $email)->first();
         
        if($query){
            $pass = $query['contrasena'];

             if($password==$pass){

                    if($query['statuspassword']==1){

                $WorklistModel = new \App\Models\WorklistModel();
                $session_data = [
                    'id' => $query['id'],
                    'nickename' => $query['nickename'],
                    'name' => $query['nombre'],
                    'apellidoPaterno' => $query['apellidoPaterno'],
                    'apellidoMaterno' => $query['apellidoMaterno'],
                    'correoElectronico' => $query['correoElectronico'],
                    'tipo' => $query['tipo'],
                    'isLoggedIn' => TRUE,
                    'statuspassword' => '0',
                ];
                 
                $session->set($session_data);
               
                if($query['tipo']=='Admin'){
                    $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Welcome: '.$query['nombre'].' '.$query['apellidoPaterno'].' '.$query['apellidoMaterno']]);
                    return redirect()->to('calendarmanager');
                }

                $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Welcome: '.$query['nombre'].' '.$query['apellidoPaterno'].' '.$query['apellidoMaterno']]);
                return redirect()->to('calendar');
                
              
                //return view('dashboard/dashboard',$data);
               // echo  json_encode($query);
            }
                else{
                    
                    $session_data = [
                        'id' => $query['id'],
                        'nickename' => $query['nickename'],
                        'name' => $query['nombre'],
                        'apellidoPaterno' => $query['apellidoPaterno'],
                        'apellidoMaterno' => $query['apellidoMaterno'],
                        'correoElectronico' => $query['correoElectronico'],
                        'tipo' => $query['tipo'],
                        'isLoggedIn' => TRUE,
                        'statuspassword' => '0',
                    ];
                     
                    $session->set($session_data);
                   
                    return  view('changepassword/changepassword');
                }

            

        }
        else{
            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'The User Email or Password does not match, check with Admin']);
            return redirect()->to('/');
        }

   

    }

        }//final de if post
            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'The User Email or Password does not match, check with Admin']);
            return redirect()->to('/');
         

       
    }

    public function logout(){
        session_destroy();
        session()->destroy;

        $this->session->setFlashdata('flag', ['type' => 'primary', 'msg' => "Log Out Success"]);
        return redirect()->to('/');
        
    }

}
