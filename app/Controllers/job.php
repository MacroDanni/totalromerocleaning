<?php

namespace App\Controllers;

class Job extends BaseController
{

    public function job()
    {
        $session = \Config\Services::session();
        $WorklistModel = new \App\Models\WorklistModel();
        $session = session();
        
        if(!$session->get('isLoggedIn')){
            return redirect()->to('/');
           
        }
        else{ 

        $data['job']= $WorklistModel->where('nameEmployee', $session->get('nickename'))->orderBy('fechaAseo', 'DESC')->findAll();
     
        return view('job/job',$data);

        }

        }

        public function acceptjob($id){
            $WorklistModel = new \App\Models\WorklistModel();
            $datos=[
                'status' => "1",
                'dateagreetoclean' => date('Y-m-d H:i:s'),
            ];
          
          $resultado=$WorklistModel->update($id,$datos);

          
          $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Have a good Job!']);
          return redirect()->to('job');
        }


     public function canceljob($id){
            $WorklistModel = new \App\Models\WorklistModel();
            $datos=[
                'status' => "4",
                'dateagreetoclean' => date('Y-m-d H:i:s'),
            ];
          
          $resultado=$WorklistModel->update($id,$datos);

          
          $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Have a good Job!']);
          return redirect()->to('job');
        }


        public function startclean($id){

            $WorklistModel = new \App\Models\WorklistModel();
            $datos=[
                'status' => "2",
                'dateinprocesscleaning' => date('Y-m-d H:i:s'),
            ];
          
          $resultado=$WorklistModel->update($id,$datos);

          
          $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Have a good day!']);
          
          return redirect()->to('job');
        }


        public function cleanedup($id){
            $WorklistModel = new \App\Models\WorklistModel();

            $data['cleanedup']= $WorklistModel->where('id', $id)->where('id !=', $id)->first();
          
            return view('job/cleanedup',$data);
        }

        public function jobfinished($id){
           
            $session = \Config\Services::session();
            $WorklistModel = new \App\Models\WorklistModel();
            $datos=[
                'status' => "3",
                'datejobfinished' => date('Y-m-d H:i:s'),
            ];
            $resultado=$WorklistModel->update($id,$datos);
            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Job Finished, Thanks '.$session->get('nickname')]);
          

            return redirect()->to('job');
       
        }




}
