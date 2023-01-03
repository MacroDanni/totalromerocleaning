<?php

namespace App\Controllers;

class Cleaningsupply extends BaseController
{


    public function cleaningsupply()
    {
        $ProductModel = new \App\Models\ProductModel();
        $data['Product'] = $ProductModel->orderBy('nombre', 'DESC')->findAll();
        return view('cleaningsupply/cleaningsupply',$data);
        }



        public function editcleaningsupply($id){
            $ProductModel = new \App\Models\ProductModel();
            $data['cleaningsupply'] = $ProductModel->where('id', $id)->first();
            return view('cleaningsupply/newcleaningsupply',$data);
            
        }

        public function newcleaningsupply(){
            
            return view('cleaningsupply/newcleaningsupply');
        }


        public function savecleaningsupply(){
            $ProductModel = new \App\Models\ProductModel();
            $datos = [
                'nombre' => $this->request->getPost('nombre'),
                'tipo' => $this->request->getPost('tipo'),
            ];
            $resultado = $ProductModel->insert($datos);

            return redirect()->to('cleaningsupply');
           
        }

        
        public function saveedit($id){
            $ProductModel = new \App\Models\ProductModel();
            $datos = [
                'tipo'=>  $this->request->getPost('tipo'),
                'nombre'=>  $this->request->getPost('nombre'),
            ];
            $resultado = $ProductModel->update($id,$datos);

         return redirect()->to('cleaningsupply');
           
        }

}
