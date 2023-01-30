<?php

namespace App\Controllers;

use Config\View;

class Job extends BaseController
{

  public function job()
  {
    $session = \Config\Services::session();
        if (!$session->id) {
            
        $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
        return redirect()->to('/');
        }
    $WorklistModel = new \App\Models\WorklistModel();
    $OrdenworklistModel = new \App\Models\OrdenworklistModel();
    $session = session();

    if (!$session->get('isLoggedIn')) {
      return redirect()->to('/');
    } else {

      $data_array = array('nameEmployee' => $session->get('nickename'), 'status < ' => 3);
      $data['job'] = $WorklistModel->where($data_array)->orderBy('registrationdate', 'desc')->findAll();


      //$data['job'] = $OrdenworklistModel->where($data_array)->orderBy('registrationdate', 'desc')->findAll();
      return view('job/job', $data);
    }
  }

  public function acceptjob($id)
  {
    $session = \Config\Services::session();
        if (!$session->id) {
            
        $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
        return redirect()->to('/');
        }
    $WorklistModel = new \App\Models\WorklistModel();

    $resultado = $WorklistModel->update($id, [
      'status' => "1",
      'dateagreetoclean' => date('Y-m-d H:i:s'),
    ]);



    if ($resultado == 1) {


      $data = $WorklistModel->where('id', $id)->first();

      $to = 'pauletteromero@totalromeroscleaning.com,' . $session->correoElectronico;
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

        $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se guardo la informacion pero no mando el email.']);
        return redirect()->to('job');
      }

    }

    $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se genero la orden correctamente']);
    return redirect()->to('job');
  }






  public function canceljob($id)
  {
    $session = \Config\Services::session();
    if (!$session->id) {
        
    $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
    return redirect()->to('/');
    }
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

    $session = \Config\Services::session();
    if (!$session->id) {
        
    $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
    return redirect()->to('/');
    }
    $WorklistModel = new \App\Models\WorklistModel();
    $datos = [
      'status' => "2",
      'dateinprocesscleaning' => date('Y-m-d H:i:s'),
    ];
    $resultado = $WorklistModel->update($id, $datos);
    $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Que tengas un excelente dia!']);
    return redirect()->to('fotosantes/' . $id . '');


  }


  public function cleanedup($id)
  {
 
    $session = \Config\Services::session();
    if (!$session->id) {
        
    $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
    return redirect()->to('/');
    }
    $WorklistModel = new \App\Models\WorklistModel();

    $data['cleanedup'] = $WorklistModel->where('id', $id)->first();


    return view('job/cleanedup', $data);
  }


  public function cargafotos()
  {
    $session = \Config\Services::session();
    if (!$session->id) {
        
    $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
    return redirect()->to('/');
    }

    $WorklistModel = new \App\Models\WorklistModel();
    $FotosModel = new \App\Models\FotosModel();
    $id = $this->request->getPost('id');
    $tipo = $this->request->getPost('tipo');
    $session = \Config\Services::session();
    $countfiles = count($_FILES['imagensubida']['size']);




    for ($i = 0; $i < $countfiles; $i++) {

      $filename = $_FILES['imagensubida']['tmp_name'][$i];
      $name = basename($_FILES["imagensubida"]["type"][$i]);
      $nombreimagen = $session->nickename . '-' . date('mdYHis') . '-' . $i . '.' . $name;
      $resultadoimagen = move_uploaded_file($_FILES['imagensubida']['tmp_name'][$i], 'dist/img/reportes/' . $nombreimagen . '');


      $resultado = $FotosModel->insert([
        "nombre" => $nombreimagen,
        "idworklist" => $id,
        "estatus" => $tipo
      ]);

    }

    if ($tipo == 'despues') {

      $resultado = $WorklistModel->update($id, [
        'status' => "3",
        'datejobfinished' => date('Y-m-d H:i:s')
      ]);

      $data_array = array('idworklist' => $id, 'estatus' => 'despues');
      $dato['fotos'] = $FotosModel->where($data_array)->findAll();
    } else {

      $data_array = array('idworklist' => $id, 'estatus' => 'antes');
      $dato['fotos'] = $FotosModel->where($data_array)->findAll();

    }


    return View('job/descripcionfotos', $dato);

  }


  public function guardardescripcionfotos()
  {
    $session = \Config\Services::session();
    if (!$session->id) {
        
    $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
    return redirect()->to('/');
    }
    $FotosModel = new \App\Models\FotosModel();
    $OrdenworklistModel = new \App\Models\OrdenworklistModel();
    $WorklistModel = new \App\Models\WorklistModel();

    $idordenworklist = $this->request->getPost('idordenworklist');
    $idworklist = $this->request->getPost('idworklist');

    $descripciones = $_POST['descripcion'];
    $ids = array_keys($descripciones);

    foreach ($ids as $id) {
      $descripcion = $descripciones[$id];

      $FotosModel->update($id, [
        'descripcion' => $descripcion
      ]);

    }


    $resultado = $WorklistModel->update($idworklist, [
      'estatusimagen' => 1
    ]);

    if ($resultado == 1) {
      $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Fotos guardadas satisfactoriamente, que tengas un excelente dia!']);
      return redirect()->to('job');
    } else {
      $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se actualizo correctamente,']);
      return redirect()->to('job');
    }




  }



  public function jobfinished()
  {
    $OrdenworklistModel = new \App\Models\OrdenworklistModel();
    $WorklistModel = new \App\Models\WorklistModel();
    $FotosModel = new \App\Models\FotosModel();
    $id = $this->request->getPost('id');
    $session = \Config\Services::session();
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

        $resultado = $FotosModel->insert([
          "idordenworklist" => $id,
          "nombre" => $nombreimagen,
          "idworklist" => $id
        ]);

      }

      $resultado = $WorklistModel->update($id, [
        'status' => "3",
        'datejobfinished' => date('Y-m-d H:i:s'),
        'estatusimagen' => 2
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

  public function fotosantes($id)
  {
    $session = \Config\Services::session();
    if (!$session->id) {
        
    $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
    return redirect()->to('/');
    }
    $WorklistModel = new \App\Models\WorklistModel();
    $data['cleanedup'] = $WorklistModel->where('id', $id)->first();

    return view('job/fotosantes', $data);
  }

  public function guardarfotosantes()
  {
    $session = \Config\Services::session();
    if (!$session->id) {
        
    $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
    return redirect()->to('/');
    }
 
    $WorklistimagenesantesModel = new \App\Models\WorklistimagenesantesModel();
    $id = $this->request->getPost('id');

    $countfiles = count($_FILES['imagensubida']['size']);
    for ($i = 0; $i < $countfiles; $i++) {

      $filename = $_FILES['imagensubida']['tmp_name'][$i];
      $name = basename($_FILES["imagensubida"]["type"][$i]);
      $nombreimagen = 'antes-' . $session->nickename . '-' . date('mdYHis') . '-' . $i . '.' . $name;
      $resultadoimagen = move_uploaded_file($_FILES['imagensubida']['tmp_name'][$i], 'dist/img/reportes/' . $nombreimagen . '');

      $resultado = $WorklistimagenesantesModel->insert([
        "nombre" => $nombreimagen,
        "nickname" => $session->nickename,
        "idTrabajo" => $id
      ]);

    }

    $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Trabajo Finalizado, Muchas Gracias ' . $session->get('nickname') . ', que tengas un excelente dia!']);
    return redirect()->to('job');

  }


  public function trabajosfinalizado()
  {

    $session = \Config\Services::session();
    if (!$session->id) {
        
    $this->session->setFlashdata('flag', ['type' => 'info', 'msg' => 'Tiempo de sesion expirado']);
    return redirect()->to('/');
    }
    $WorklistModel = new \App\Models\WorklistModel();
    $EmployeeModel = new \App\Models\EmployeeModel();
    $session = \Config\Services::session();
    $dataArray = ['status'=> '3','nameEmployee'=>$session->nickename];
    $data['finalizados'] = $WorklistModel->where($dataArray)->findAll();
    $data['employee'] = $EmployeeModel->where('id', $session->id);

    return view('job/trabajosfinalizado', $data);
  }



}