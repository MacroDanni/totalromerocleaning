<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function dashboard()
    {
        $session = \Config\Services::session();
        $session = session();

        if(!$session->get('isLoggedIn')){
            return redirect()->to('/');
          
        }
        else{ 
    
            return view('dashboard/dashboard');
        }

       
        }

}
