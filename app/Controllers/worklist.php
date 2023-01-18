<?php

namespace App\Controllers;

class Worklist extends BaseController
{

    public function worklist()
    {



        $WorklistModel = new \App\Models\WorklistModel();
        $EmployeeModel = new \App\Models\EmployeeModel();
        $data['worklist'] = $WorklistModel->where('status !=', '3')->orderBy('registrationdate', 'ASC')->findAll();
        $data['employee'] = $EmployeeModel->find($this->request->getPost('employee'));
        return view('worklist/work', $data);
    }

    public function guardareditar()
    {

        $ServicesModel = new \App\Models\ServicesModel();
        $BuildingModel = new \App\Models\BuildingModel();
        $BusinessModel = new \App\Models\BusinessModel();
        $EmployeeModel = new \App\Models\EmployeeModel();

        $data1['services'] = $ServicesModel->orderBy('name', 'ASC')->findAll();
        $data2['building'] = $BuildingModel->orderBy('property', 'ASC')->findAll();
        $data3['business'] = $BusinessModel->orderBy('nombre', 'ASC')->findAll();
        $data4['employee'] = $EmployeeModel->orderBy('nombre', 'ASC')->findAll();

        $data = array_merge($data1, $data2, $data3, $data4);

        return view('worklist/guardareditar', $data);

    }


    public function salvarcancelado()
    {

        $WorklistModel = new \App\Models\WorklistModel();
        $EmployeeModel = new \App\Models\EmployeeModel();

        $nickname = $this->request->getPost('nickename');
        $idWorklist = $this->request->getPost('id');

        $datosempleado = $EmployeeModel->where('nickename', $nickname)->first();
        $datosworklist = $WorklistModel->where('id', $idWorklist)->first();


        $datos = [
            'status' => '0',
            'nameEmployee' => $this->request->getPost('nickename')

        ];

        $resultado = $WorklistModel->update($idWorklist, $datos);

        if ($resultado == 1) {
            $to = $datosempleado['correoElectronico'] . ',pauletteromero@totalromeroscleaning.com';
            $subject = "New Service: " . $datosworklist['nameservice'];
            $message = '
            <br>Detalles del servicio:<BR>Edificio: ******** <br>Servicio: ' . $datosworklist['nameservice'] . '<br># Edificio: ********* <br># Habitacion: ********* <br>Fecha del Servicio: ' . $datosworklist['fechaAseo'] . '<br> Descripcion: ' . $datosworklist['description'] . '<br>
            <br>
            <p><a href="http://totalromeroscleaning.com/" class="btn btn-outline-warning">Iniciar sesión - TotalRomeroCleaning</a></p>
              ';

            $email = \Config\Services::email();
            $email->setTo($to);
            $email->setFrom('notification@totalromeroscleaning.com', 'Notificacion - TotalRomerosCleaning');

            $email->setSubject($subject);
            $email->setMessage($message);

            $respuesta = $email->send();


            if ($respuesta == 1) {


                $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se notifico al usuario correctamente']);
                return redirect()->to('worklist');
            } else {

                $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se notifico al usuario, error servidor']);
                return redirect()->to('worklist');
            }

        } else
            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'Error con servidor , contactar al administrador']);
        return redirect()->to('worklist');

    }

    public function saveWorklist()
    {

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
            'numberBuilding' => $this->request->getPost('numberBuilding'),
            'status' => "0",
        ];

        $dats = $EmployeeModel->where('nickename', $this->request->getPost('employee'))->first();


        $wasSuccess = $WorklistModel->insert($newWorklist);

        $newRecord = [
            'id_worklist' => $WorklistModel->getInsertID(),
            'id_employee' => $this->request->getPost('employee'),
        ];

        $to = $dats['correoElectronico'];
        $subject = "Nuevo Servicio: " . $this->request->getPost('service');
        $message = '
            <br>Detail Service:<BR>Edificio: ******** <br>Servicio: ' . $this->request->getPost('service') . '<br># Edificio: ********* <br># Habitacion: ********* <br>Fecha de Servicio: ' . $this->request->getPost('date') . '<br> Descripcion: ' . $this->request->getPost('description') . '<br>
            <br>
            <p><a href="http://totalromeroscleaning.com/" class="btn btn-outline-warning">Iniciar sesión - TotalRomeroCleaning</a></p>
              ';

        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('notification@totalromeroscleaning.com', 'Notification - TotalRomerosCleaning');

        $email->setSubject($subject);
        $email->setMessage($message);

        $respuesta = $email->send();


        if ($respuesta == 1) {


            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se notifico al usuario correctamente']);
            return redirect()->to('guardareditar');
        } else {

            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se notifico al usuario, error servidor']);
            return redirect()->to('worklist');
        }



    }



    public function worklistfinalizados()
    {
        $WorklistModel = new \App\Models\WorklistModel();
        $EmployeeModel = new \App\Models\EmployeeModel();
        $session = \Config\Services::session();
        $data['finalizados'] = $WorklistModel->where('status', '3')->findAll();
        $data['employee'] = $EmployeeModel->where('id', $session->id);

        return view('worklist/worklistfinalizados', $data);

    }


    public function eliminartemp($id)
    {
        $WorklistModel = new \App\Models\WorklistModel();
        $data['worklist'] = $WorklistModel->where('id', $id)->first();

        return view('worklist/eliminartemp', $data);
    }

    public function eliminarworklist($id)
    {

        $WorklistModel = new \App\Models\WorklistModel();
        $data['worklist'] = $WorklistModel->where('id', $id)->first();
        $resultado = $WorklistModel->delete(['id' => $id]);


        if ($resultado > 0) {
            $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se a eliminado satisfactoriamente ']);
            return redirect()->to('worklist');
        } else {
            $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'Error, no se pudo eliminar, contactar al administrador']);

            return redirect()->to('worklist');
        }
    }

    public function verfotos()
    {

        $WorklistModel = new \App\Models\WorklistModel();
        $FotosModel = new \App\Models\FotosModel();
        $session = \Config\Services::session();

        $data_arrayantes = array('idworklist'=> $this->request->getPost('idworklist'), 'estatus' => 'antes');
        $data_arraydespues = array('idworklist'=> $this->request->getPost('idworklist'), 'estatus' => 'despues');
        $data['antes'] = $FotosModel->where($data_arrayantes)->findAll();
        $data['despues'] = $FotosModel->where($data_arraydespues)->findAll();


      

        return view('worklist/verfotos', $data);


    }

    



}