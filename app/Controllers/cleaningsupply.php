<?php

namespace App\Controllers;

class Cleaningsupply extends BaseController
{


    public function cleaningsupply()
    {
        $Cleaningsupply = new \App\Models\Cleaningsupply();
        $data['cleaningsupply'] = $Cleaningsupply->orderBy('nombre', 'DESC')->findAll();
        return view('cleaningsupply/cleaningsupply',$data);
        }

        public function newcleaningsupply(){
            return view('cleaningsupply/newcleaningsupply');
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

}
