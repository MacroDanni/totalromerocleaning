<?php

namespace App\Controllers;

class Servicio extends BaseController
{


  public function servicios()
  {
    $ServiciosModel = new \App\Models\ServiciosModel();
    $data['servicios'] = $ServiciosModel->orderBy('name', 'ASC')->findAll();


    return view('servicio/servicios', $data);

  }
  public function crearservicio()
  {
    return view('servicio/guardareditar');
  }

  public function nuevoservicio()
  {

    $ServiciosModel = new \App\Models\ServiciosModel();

    $resultado = $ServiciosModel->insert([
      'name' => $this->request->getPost('nombre'),
      'costousuario' => $this->request->getPost('costousuario'),
      'costoreal' => $this->request->getPost('costoreal'),
      'tiempotrabajo' => $this->request->getPost('tiempotrabajo'),
      'description' => $this->request->getPost('description')
    ]);

    $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se registro correctamente']);
    return redirect()->to('crearservicio');



  }

  public function editarservicio($id)
  {
    $ServiciosModel = new \App\Models\ServiciosModel();
    $data['servicio'] = $ServiciosModel->where('id', $id)->first();


    return view('servicio/guardareditar', $data);

  }

  public function guardareditarservicio()
  {
    $ServiciosModel = new \App\Models\ServiciosModel();
    $id = $this->request->getPost('id');
    $dato = [
      $id,
      'name' => $this->request->getPost('nombre'),
      'costousuario' => $this->request->getPost('costousuario'),
      'costoreal' => $this->request->getPost('costoreal'),
      'tiempotrabajo' => $this->request->getPost('tiempotrabajo'),
      'description' => $this->request->getPost('description'),
    ];

    $resultado = $ServiciosModel->update($id, [
      'name' => $this->request->getPost('nombre'),
      'costousuario' => $this->request->getPost('costousuario'),
      'costoreal' => $this->request->getPost('costoreal'),
      'tiempotrabajo' => $this->request->getPost('tiempotrabajo'),
      'description' => $this->request->getPost('description'),
    ]);
    if ($resultado == 1) {

      $this->session->setFlashdata('flag', ['type' => 'success', 'msg' => 'Se registro correctamente']);
      return redirect()->to('servicios');
    }

    $this->session->setFlashdata('flag', ['type' => 'danger', 'msg' => 'No se registro correctamente']);
    return redirect()->to('servicios');


  }
  public function eliminarserviciotemp($id)
  {
    $ServiciosModel = new \App\Models\ServiciosModel();
    $data['servicio'] = $ServiciosModel->where('id', $id)->first();

    return view('servicio/eliminartemp', $data);

  }
  public function eliminarservicio($id)
  {
    $ServiciosModel = new \App\Models\ServiciosModel();
    $resultado = $ServiciosModel->delete(['id' => $id]);

    return redirect()->to('servicios');
  }

}