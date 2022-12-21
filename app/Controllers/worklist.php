<?php

namespace App\Controllers;

class Worklist extends BaseController
{

    public function worklist()
    {

        $WorklistModel = new \App\Models\WorklistModel();
        $EmployeeModel = new \App\Models\EmployeeModel();
        $data['worklist'] = $WorklistModel->orderBy('registrationdate', 'ASC')->findAll();
        $data['employee'] = $EmployeeModel->find($this->request->getPost('employee'));
       return view('worklist/work',$data);
    }

    public function guardareditar(){

        $ServicesModel = new \App\Models\ServicesModel();
        $BuildingModel = new \App\Models\BuildingModel();
        $BusinessModel = new \App\Models\BusinessModel();
        $EmployeeModel = new \App\Models\EmployeeModel();

        $data1['services'] = $ServicesModel->orderBy('name', 'ASC')->findAll();
        $data2['building'] = $BuildingModel->orderBy('property', 'ASC')->findAll();
        $data3['business'] = $BusinessModel->orderBy('nombre', 'ASC')->findAll();
        $data4['employee'] = $EmployeeModel->orderBy('nombre', 'ASC')->findAll();

        $data = array_merge($data1, $data2,$data3,$data4);

        return view('worklist/guardareditar',$data);

    }

    public function saveWorklist(){
        
        $EmployeeModel = new \App\Models\EmployeeModel();
        $WorklistModel = new \App\Models\WorklistModel();



        $newWorklist = [
         // 'id_building' => $this->request->getPost('building'),
         //   'id_business' => $this->request->getPost('business'),
         //   'id_employee' => $this->request->getPost('employee'),
         //   'id_service' => $this->request->getPost('services'),
            'nameBuilding' => ucfirst($this->request->getPost('building')),
            'nameBusiness' => 'TotalRomerosCleaning',
            'nameEmployee' => $this->request->getPost('employee'),
            'nameservice' => $this->request->getPost('service'),
            'numroom' => $this->request->getPost('numroom'),
            'fechaAseo' => $this->request->getPost('date'),
            'description' => $this->request->getPost('description'),
            'numberBuilding'=> $this->request->getPost('numberBuilding'),
            'status' => "0",
        ];
        
       $dats=$EmployeeModel->where('nickename', $this->request->getPost('employee'))->first();
        
 
         $wasSuccess = $WorklistModel->insert($newWorklist);
       
        $newRecord = [
            'id_worklist'=>  $WorklistModel->getInsertID(),
            'id_employee'=>  $this->request->getPost('employee'),
            ];
    
            $to= $dats['correoElectronico'];
            $subject="New Service: ".$this->request->getPost('service');
            $message='
            <br>Detail Service:<BR>Building: ******** <br>Service: '.$this->request->getPost('service').'<br># Building: ********* <br># Room: ********* <br>Service Date: '. $this->request->getPost('date').'<br> Description: '.$this->request->getPost('description').'<br>
            <br>
            <p><a href="https://totalromeroscleaning.com/" class="btn btn-outline-warning">Log In TotalRomeroCleaning</a></p>
              ';
        
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('notification@totalromeroscleaning.com', 'Notification - TotalRomerosCleaning');
        
        $email->setSubject($subject);
        $email->setMessage($message);
        
        $respuesta=$email->send();
            
        
            if($respuesta==1){

                   
                $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se notifico al usuario correctamente']);
                return redirect()->to('worklist'); 
            }
            else{

                $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se notifico al usuario, error servidor']);
                return redirect()->to('worklist'); 
            }

      
     
    }

}

