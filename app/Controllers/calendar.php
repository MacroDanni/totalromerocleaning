<?php

namespace App\Controllers;

class Calendar extends BaseController
{
    public function calendar()

    {$session = \Config\Services::session();

        if(!$session){
            return redirect()->to('/');
        }

        $WorklistModel = new \App\Models\WorklistModel();
        $EmployeeModel = new \App\Models\EmployeeModel();
        $session = \Config\Services::session();

        $calendario = $WorklistModel->where('nameEmployee', $session->nickename)->findAll();
        $eventosCalendario = [];

        foreach ($calendario as $evento) {

            if ($evento['status'] == 0) {
                $color = '#C8CFC6';
                $descripcion = 'Pendiente';
                $textcolor = '#000000';
            }
            elseif ($evento['status'] == 1) {
                $color = '#FFC107';
                $descripcion = 'Aceptado';
                $textcolor = '#000000';
            }
            elseif ( $evento['status'] == 2) {
                $color = '#FFC107';
                $descripcion = 'Limpiando';
                $textcolor = '#000000';
            }
            elseif ($evento['status'] == 3) {
                $color = '#198754';
                $descripcion = 'finalizado';
                $textcolor = '';
            } else {
                $color = '';
                $descripcion = '';
                $textcolor = '#000000';
            }

            $eventosCalendario[] = [
                'title'=> $evento['nameBuilding'].'('.$descripcion.')',
                'start'=> $evento['fechaAseo'],
                'color'    =>  $color,
                'default'=> 'timeZone',
                'textColor'=>$textcolor
                
            ];
        }

       $dato['calendario'] = json_encode($eventosCalendario);
 
        return view('calendar/calendar',$dato);
    }




    public function calendarmanager()

    {
        $session = \Config\Services::session();

        if(!$session){
            return redirect()->to('/');
        }

        $WorklistModel = new \App\Models\WorklistModel();
        $EmployeeModel = new \App\Models\EmployeeModel();
        $session = \Config\Services::session();

        $calendario = $WorklistModel->findAll();
       // print_r($calendario);
      //  die();
        $eventosCalendario = [];

        foreach ($calendario as $evento) {

            if ($evento['status'] == 0) {
                $color = '#C8CFC6';
                $descripcion = 'Pendiente';
                $textcolor = '#000000';
            }
            elseif ($evento['status'] == 1) {
                $color = '#FFC107';
                $descripcion = 'Aceptado';
                $textcolor = '#000000';
            }
            elseif ( $evento['status'] == 2) {
                $color = '#FFC107';
                $descripcion = 'Limpiando';
                $textcolor = '#000000';
            }
            elseif ($evento['status'] == 3) {
                $color = '#198754';
                $descripcion = 'finalizado';
                $textcolor = '';
            }elseif ($evento['status'] == 4) {
                $color = '#DC3545';
                $descripcion = 'Declinado';
                $textcolor = '';
            } else {
                $color = '';
                $descripcion = '';
                $textcolor = '#000000';
            }

            $eventosCalendario[] = [
                'title'=> $evento['nameBuilding'].'('.$descripcion.') - * '.$evento['nameEmployee'],
                'start'=> $evento['fechaAseo'],
                'color'    =>  $color,
                'default'=> 'timeZone',
                'textColor'=>$textcolor
                
            ];
        }
        
       $dato['calendarioadmin'] = json_encode($eventosCalendario);
 
        return view('calendar/admin/calendarmanager',$dato);
    }
}
##