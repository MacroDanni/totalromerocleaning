<?php

namespace App\Controllers;

class Cleaningsupplyuser extends BaseController
{


    public function cleaningsupplyuser()
    {
        $Cleaningsupply = new \App\Models\CleaningsupplyModel();
        $data['cleaningsupply'] = $Cleaningsupply->where('estatus >', 0)->orderBy('nombre', 'DESC')->findAll();
        return view('cleaningsupply/user/cleaningsupplyuser',$data);
        }

        public function newcleaningsupplyuser(){

            $product = new \App\Models\ProductModel();
            $data['product'] = $product->orderBy('nombre', 'DESC')->findAll();
        

            return view('cleaningsupply/user/saverequest',$data);
        }


        public function savecleaningsupply(){
            $Cleaningsupply = new \App\Models\Cleaningsupply();
            $datos = [
                'nombre' => $this->request->getPost('nombre'),
                'tipo' => $this->request->getPost('tipo'),
            ];
            $resultado = $Cleaningsupply->insert($datos);
            return redirect()->to('cleaningsupply');
           
        }
        public function solicitando(){
            $session = \Config\Services::session();
            $CleaningsupplyModel = new \App\Models\CleaningsupplyModel();

            $datos=[
                'nombre' => ucfirst($this->request->getPost('product')),
                'nickname' => $session->nickename,
                'estatus' => '1',
            ];

           $resultado = $CleaningsupplyModel->insert($datos);

//pauletteromero@totalromeroscleaning.com
           $to='macro120788@gmail.com,pauletteromero@totalromeroscleaning.com';
           $subject='Solicitud de Productos';
           $message='<h2>Solicitud de producto por '.$session->nickename.'- ('.$session->name.' '.$session->apellidoPaterno.' '.$session->apellidoMaterno.')</h2>
           <div>
           <br>
           <h2>'.ucfirst($this->request->getPost('product')).'</h2><br>
           <br>
           Gracias y excelente dia!
           </div>
           ';
            
           $email = \Config\Services::email();
           $email->setTo($to);
           $email->setFrom('notification@totalromeroscleaning.com', 'Solicitud de Producto - TotalRomerosCleaning');
           $email->setSubject($subject);
           $email->setMessage($message);
           $respuesta=$email->send();

            if($respuesta==1){

                $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => $this->request->getVar('product').', Se mando la solicitud correctamente']);
                return redirect()->to('cleaningsupplyuser');
            }

            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se mando el correo satisfactoriamente']);
            return redirect()->to('cleaningsupplyuser');       
                        
        }
}
