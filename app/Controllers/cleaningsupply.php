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
        return view('cleaningsupply/cleaningsupply',$data);
        }



        public function editcleaningsupply($id){
            $session = \Config\Services::session();
            if (!$session->id) {
                
            $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
            return redirect()->to('/');
            }
            $ProductModel = new \App\Models\ProductModel();
            $data['cleaningsupply'] = $ProductModel->where('id', $id)->first();
            return view('cleaningsupply/newcleaningsupply',$data);
            
        }

        public function newcleaningsupply(){
            $session = \Config\Services::session();
            if (!$session->id) {
                
            $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
            return redirect()->to('/');
            }
            
            return view('cleaningsupply/newcleaningsupply');
        }


        public function savecleaningsupply(){
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

        
        public function saveedit($id){
            $session = \Config\Services::session();
            if (!$session->id) {
                
            $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
            return redirect()->to('/');
            }
            $ProductModel = new \App\Models\ProductModel();
            $datos = [
                'tipo'=>  $this->request->getPost('tipo'),
                'nombre'=>  $this->request->getPost('nombre'),
            ];
            $resultado = $ProductModel->update($id,$datos);

         return redirect()->to('cleaningsupply');
           
        }

}
