<?php

namespace App\Controllers;

class savepasswordemployee extends BaseController
{

    public function savepassword()
    {
        $session = \Config\Services::session();
        $EmployeeModel = new \App\Models\EmployeeModel();
        $session = session();
        if($this->request->getPost('password1')==$this->request->getPost('password2')){
           
           $id= $this->request->getPost('id');
            $datos = [
                'contrasena'=>  $this->request->getPost('password1'),
                'statuspassword' => '1',
                ];
                $resultado=$EmployeeModel->update($id, $datos);

                $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'La contraseña se cambio y guardo satisfactoriamente!']);
                 return redirect()->to('dashboard');
        }

        $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'La contraseña no coincide, vuelve a ingresarlo.']);
        
        return  view('changepassword/changepassword');
     
    }
}


?>