<?php

namespace App\Controllers;

class Cleaningsupply extends BaseController
{


    public function cleaningsupply()
    {

        $session = \Config\Services::session();
        if (!$session->id) {

            $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
            return redirect()->to('/');
        }
        $ProductModel = new \App\Models\ProductModel();
        $data['Product'] = $ProductModel->orderBy('nombre', 'DESC')->findAll();
        return view('cleaningsupply/cleaningsupply', $data);
    }

    public function catalogoa()
    {
        $session = \Config\Services::session();
        if (!$session->id) {

            $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
            return redirect()->to('/');
        }

        $CleaningsupplyModel = new \App\Models\CleaningsupplyModel();
        $data['solicitud'] = $CleaningsupplyModel->findAll();
        return view('cleaningsupply/catalogoa', $data);

    }

    public function aceptarsuministro($id)
    {
        $session = \Config\Services::session();
        if (!$session->id) {

            $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
            return redirect()->to('/');
        }

        $EmployeeModel = new \App\Models\EmployeeModel();
        $CleaningsupplyModel = new \App\Models\CleaningsupplyModel();
        $resultado = $CleaningsupplyModel->update($id, [
            'estatus' => 1,
        ]);

        if ($resultado == 1) {
            $datasuministro = $CleaningsupplyModel->where('id', $id)->first();
            $dataemployee = $EmployeeModel->where('nickename', $datasuministro['nickname'])->first();


            /* *** envio de email  *** */
            //pauletteromero@totalromeroscleaning.com
            $to = $dataemployee['correoElectronico'];
            $subject = 'Producto Aceptado ' . $dataemployee['nickename'];
            $message = '<h3>Producto Aceptado (' . $dataemployee['nombre'] . ' ' . $dataemployee['apellidoPaterno'] . ' ' . $dataemployee['apellidoMaterno'] . ')</h3>
           <div>
           <br>
           <h3>El ' . $datasuministro['nombre'] . ' ya fue notificado correctamente.<br>
           <br>
           Gracias y excelente dia!</h3>
           </div>
           ';

            $email = \Config\Services::email();
            $email->setTo($to);
            $email->setFrom('notification@totalromeroscleaning.com', 'Solicitud de Producto - TotalRomerosCleaning');
            $email->setSubject($subject);
            $email->setMessage($message);
            $respuesta = $email->send();

            if ($respuesta == 1) {

                $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se notifico correctamente al usuario.']);
                return redirect()->to('catalogoa');
            }

            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se mando el correo de notificación']);
            return redirect()->to('catalogoa');
            /* Fin de email */



        }


    }



    public function savecleaningsupply()
    {
        $session = \Config\Services::session();
        if (!$session->id) {

            $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
            return redirect()->to('/');
        }
        $ProductModel = new \App\Models\ProductModel();
        $datos = [
            'nombre' => $this->request->getPost('nombre'),
            'tipo' => $this->request->getPost('tipo'),
        ];
        $resultado = $ProductModel->insert($datos);

        return redirect()->to('cleaningsupply');

    }

    public function editcleaningsupply($id)
    {
        $session = \Config\Services::session();
        if (!$session->id) {

            $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
            return redirect()->to('/');
        }
        $ProductModel = new \App\Models\ProductModel();
        $data['cleaningsupply'] = $ProductModel->where('id', $id)->first();
        return view('cleaningsupply/newcleaningsupply', $data);

    }

    public function saveedit($id)
    {
        $session = \Config\Services::session();
        if (!$session->id) {

            $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
            return redirect()->to('/');
        }
        $ProductModel = new \App\Models\ProductModel();
        $resultado = $ProductModel->update($id, [
            'tipo' => $this->request->getPost('tipo'),
            'nombre' => $this->request->getPost('nombre'),
        ]);

        return redirect()->to('cleaningsupply');

    }

}