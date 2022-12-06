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
        
        $EmployeeModel = new \App\Models\EmployeeModel();
        $WorklistModel = new \App\Models\WorklistModel();



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
        
       $dats=$EmployeeModel->where('nickename', $this->request->getPost('employee'))->first();
        
 
         $wasSuccess = $WorklistModel->insert($newWorklist);
       
        $newRecord = [
            'id_worklist'=>  $WorklistModel->getInsertID(),
            'id_employee'=>  $this->request->getPost('employee'),
            ];
    
        
            $to= $dats['correoElectronico'];
            $subject="New Service: ".$this->request->getPost('service');
            $message='
            <!doctype html>
            <html lang="en">
              <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Bootstrap demo</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
              </head>
              <body>
              <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-header">Header</div>
              <div class="card-body">
                <h5 class="card-title">Primary card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
              </div>
            </div>
       <br>Detail Service: <br>Business:'.ucfirst($this->request->getPost('business')).'<BR>Building: ******** <br>Service: '.$this->request->getPost('service').'<br># Room: ********* <br>Service Date: '. $this->request->getPost('date').'<br> Description: '.$this->request->getPost('description').'<br>
       <br>
       <p><a href="https://totalromerocleaning.com/" class="btn btn-outline-warning">Log In TotalRomeroCleaning</a>
            </p>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
              </body>
            </html>';
        
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('notification@totalromerocleaning.com', 'Notification - TotalRomeroCleaning');
        
        $email->setSubject($subject);
        $email->setMessage($message);
        
        $email->send();
            

         //    mail($to,$subject,$message);
        
        $data['worklist'] = $WorklistModel->orderBy('fechaAseo', 'ASC')->findAll();
        $data['employee'] = $EmployeeModel->find($this->request->getPost('employee'));


       //  echo json_encode($data);
       // die();

     
        return view('worklist/work', $data);
    }

}

