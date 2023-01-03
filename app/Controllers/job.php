<?php

namespace App\Controllers;

class Job extends BaseController
{

  public function job()
  {
    $session = \Config\Services::session();
    $WorklistModel = new \App\Models\WorklistModel();
    $session = session();

    if (!$session->get('isLoggedIn')) {
      return redirect()->to('/');
    } else {

      $data_array = array('nameEmployee' => $session->get('nickename'), 'status < ' => 4);
      $data['job'] = $WorklistModel->where($data_array)->orderBy('registrationdate', 'desc')->findAll();

      return view('job/job', $data);
    }
  }

  public function acceptjob($id)
  {
    $WorklistModel = new \App\Models\WorklistModel();
    $datos = [
      'status' => "1",
      'dateagreetoclean' => date('Y-m-d H:i:s'),
    ];
    $data = $WorklistModel->where('id', $id)->first();
    $resultado = $WorklistModel->update($id, $datos);
    $session = \Config\Services::session();
    $to = 'pauletteromero@totalromeroscleaning.com,' . $session->correoElectronico;
    //print_r($data['id']);
    // die();

    $subject = "Servicio Aceptado";
    $message = '
          <h2>Gracias por aceptar el trabajo, que tengas un excelente dia ' . $session->name . ' ' . $session->apellidoPaterno . ' ' . $session->apellidoMaterno . '!</h2>
          <br><h3>
          <br>Detalle del servicio:<BR>Building: ' . $data['nameBuilding'] . ' <br>Servicio: ' . $data['nameservice'] . '<br># Edificio: ' . $data['numberBuilding'] . ' <br># Habitacion:  ' . $data['numroom'] . ' <br>Fecha de Servicio: ' . $data['fechaAseo'] . '<br> Descripcion: ' . $data['description'] . '<br>
          <br>
          <p><a href="http://totalromeroscleaning.com/" class="btn btn-outline-warning">Inicio de sesion en TotalRomeroCleaning</a></p>
           </h3> ';

    $email = \Config\Services::email();
    $email->setTo($to);
    $email->setFrom('notification@totalromeroscleaning.com', 'Notification Aceptado - TotalRomerosCleaning');

    $email->setSubject($subject);
    $email->setMessage($message);

    $respuesta = $email->send();

    if ($respuesta == 1) {
      $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Gracias!, ten un excelente dia!']);
      return redirect()->to('job');
    } else {

      $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Gracias!, ten un excelente dia!']);
      return redirect()->to('job');
    }
  }


  public function canceljob($id)
  {
    $WorklistModel = new \App\Models\WorklistModel();
    $datos = [
      'status' => "4",
      'dateagreetoclean' => date('Y-m-d H:i:s'),
    ];

    $resultado = $WorklistModel->update($id, $datos);

    $data = $WorklistModel->where('id', $id)->first();
    $session = \Config\Services::session();
    $to = 'pauletteromero@totalromeroscleaning.com,' . $session->correoElectronico;
    //print_r($data['id']);
    // die();

    $subject = "Servicio Cancelado";
    $message = ' 
          <h2>Se cancelo correctamente, que tengas un excelente dia ' . $session->name . ' ' . $session->apellidoPaterno . ' ' . $session->apellidoMaterno . '!</h2>
          <br><h3>
          <br>Detalle del servicio:<BR>Building: ******** <br>Servicio: ' . $data['nameservice'] . '<br># Edificio: ********* <br># Habitacion: ********* <br>Fecha de Servicio: ' . $data['fechaAseo'] . '<br> Descripcion: ' . $data['description'] . '<br>
          <br>
          <p><a href="http://totalromeroscleaning.com/" class="btn btn-outline-warning">Inicio de sesion en totalRomeroCleaning</a></p>
            </h3>';

    $email = \Config\Services::email();
    $email->setTo($to);
    $email->setFrom('notification@totalromeroscleaning.com', 'Notification Cancelado - TotalRomerosCleaning');

    $email->setSubject($subject);
    $email->setMessage($message);

    $respuesta = $email->send();

    if ($respuesta == 1) {

      $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Servicio cancelado, ten un excelente dia!']);
      return redirect()->to('job');
    } else {
      $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Servicio cancelado, ten un excelente dia!']);
      return redirect()->to('job');
    }
  }


  public function startclean($id)
  {

    $WorklistModel = new \App\Models\WorklistModel();
    $datos = [
      'status' => "2",
      'dateinprocesscleaning' => date('Y-m-d H:i:s'),
    ];

    $resultado = $WorklistModel->update($id, $datos);


    $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Que tengas un excelente dia!']);

    return redirect()->to('job');
  }


  public function cleanedup($id)
  {
    $WorklistModel = new \App\Models\WorklistModel();

    $data['cleanedup'] = $WorklistModel->where('id', $id)->where('id', $id)->first();

    return view('job/cleanedup', $data);
  }

  public function jobfinished()
  {
    $WorklistimagenesModel = new \App\Models\WorklistimagenesModel();
    $id = $this->request->getPost('id');
    $session = \Config\Services::session();
    $WorklistModel = new \App\Models\WorklistModel();
    $countfiles = count($_FILES['imagensubida']['size']);

    if ($_FILES['imagensubida']['size'][0] == 0) {

      $resultado = $WorklistModel->update($id, [
        'status' => "3",
        'datejobfinished' => date('Y-m-d H:i:s')
      ]);
      if ($resultado == 1) {
        $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Trabajo Finalizado, Muchas Gracias ' . $session->get('nickname') . ', que tengas un excelente dia!']);
        return redirect()->to('job');
      } else {
        $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se guardo el trabajo, vuelva a intentar pro favor']);
        return redirect()->to('job');
      }
    } else {

      for ($i = 0; $i < $countfiles; $i++) {

        $filename = $_FILES['imagensubida']['tmp_name'][$i];
        $name = basename($_FILES["imagensubida"]["type"][$i]);
        $nombreimagen = $session->nickename . '-' . date('mdYHis') . '-' . $i . '.' . $name;
        $resultadoimagen = move_uploaded_file($_FILES['imagensubida']['tmp_name'][$i], 'dist/img/reportes/' . $nombreimagen . '');
        $resultado = $WorklistimagenesModel->insert([
          "nombre" => $nombreimagen,
          "nickname" => $session->nickename,
          "idTrabajo" => $id
        ]);
      }

      $resultado = $WorklistModel->update($id, [
        'status' => "3",
        'datejobfinished' => date('Y-m-d H:i:s'),
        'estatusimagen' => 1
      ]);

      if ($resultado == 1) {
        $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Trabajo Finalizado, Muchas Gracias ' . $session->get('nickname') . ', que tengas un excelente dia!']);
        return redirect()->to('job');
      } else {
        $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se guardo el trabajo, vuelva a intentar pro favor']);
        return redirect()->to('job');
      }
    }
  }
}
