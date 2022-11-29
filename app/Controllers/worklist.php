<?php

namespace App\Controllers;

class Worklist extends BaseController
{

    public function worklist()
    {

        $WorklistModel = new \App\Models\WorklistModel();
        $data['worklist']= $WorklistModel->orderBy('fechaAseo', 'ASC')->findAll();
       return view('worklist/work',$data);
    }



    public function guardareditar(){

        $ServicesModel = new \App\Models\ServicesModel();
        $BuildingModel = new \App\Models\BuildingModel();
        $BusinessModel = new \App\Models\BusinessModel();
        $EmployeeModel = new \App\Models\EmployeeModel();

        $data1['services'] = $ServicesModel->orderBy('name', 'DESC')->findAll();
        $data2['building'] = $BuildingModel->orderBy('property', 'DESC')->findAll();
        $data3['business'] = $BusinessModel->orderBy('nombre', 'DESC')->findAll();
        $data4['employee'] = $EmployeeModel->orderBy('nombre', 'DESC')->findAll();

        $data = array_merge($data1, $data2,$data3,$data4);

        return view('worklist/guardareditar',$data);

    }

    public function saveWorklist(){
        
        $ServicesModel = new \App\Models\ServicesModel();
        $BuildingModel = new \App\Models\BuildingModel();
        $BusinessModel = new \App\Models\BusinessModel();
        $EmployeeModel = new \App\Models\EmployeeModel();

        $WorklistModel = new \App\Models\WorklistModel();
        $WorkStatusModel = new \App\Models\WorkStatusModel();

        $newWorklist = [
           // 'id_building' => $this->request->getPost('building'),
         //   'id_business' => $this->request->getPost('business'),
         //   'id_employee' => $this->request->getPost('employee'),
         //   'id_service' => $this->request->getPost('services'),
            'nameBuilding' => ucfirst($this->request->getPost('building')),
            'nameBusiness' => $this->request->getPost('business'),
            'nameEmployee' => $this->request->getPost('employee'),
            'nameservice' => $this->request->getPost('service'),
            'numroom' => $this->request->getPost('numroom'),
            'fechaAseo' => $this->request->getPost('date'),
            'description' => $this->request->getPost('description'),
            'status' => "0",
        ];
    
         $wasSuccess = $WorklistModel->insert($newWorklist);
       
        $newRecord = [
            'id_worklist'=>  $WorklistModel->getInsertID(),
            'id_employee'=>  $this->request->getPost('employee'),
            ];
    
        $resultado2 = $WorkStatusModel->insert($newRecord);

        $EmployeeModel = new \App\Models\EmployeeModel();

        
        $data['worklist'] = $WorklistModel->orderBy('fechaAseo', 'ASC')->findAll();
        $data['employee'] = $EmployeeModel->find($this->request->getPost('employee'));


       //  echo json_encode($data);
       // die();

     
        return view('worklist/work', $data);
    }

}

