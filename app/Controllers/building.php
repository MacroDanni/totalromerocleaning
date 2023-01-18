<?php

namespace App\Controllers;

class building extends BaseController
{
    public function building()
    {

        $BuildingModel = new \App\Models\BuildingModel();
        $data['building'] = $BuildingModel->orderBy('property', 'DESC')->findAll();

        return view('building/building',$data);
    }



    public function guardareditar(){

        return view('building/guardareditar');

    }


    public function savebuilding(){

        if ($this->request->getMethod() == 'post') {

            $BuildingModel = new \App\Models\BuildingModel();

            $datos = [
                'property' => $this->request->getPost('property'),
                'contact' => $this->request->getPost('contact'),
                'phone' => $this->request->getPost('phone'),
                'email' => $this->request->getPost('email'),
                'address' => $this->request->getPost('address'),
            ];
            $resultado = $BuildingModel->insert($datos);

            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => $this->request->getVar('nombre') . ' ' . 'Se registro correctamente']);
            return redirect()->to('building');

        } 

        else{

            return view('building/building');
        }
       

    }


    public function editarbuilding($id){
        
        $BuildingModel = new \App\Models\BuildingModel();
        $data['building'] = $BuildingModel->where('id', $id)->first();


        return view('building/guardareditar',$data);
    }


}