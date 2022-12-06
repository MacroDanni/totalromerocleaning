<?php 
namespace App\Controllers;
use App\Models\FormModel;
use CodeIgniter\Controller;
class SendMail extends Controller
{
    public function index() 
	{
        return view('form_view');
    }
    function sendMail() { 
       
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
        <br>Detail Service: <br>Business:'.ucfirst($this->request->getPost('business')).'<BR>Building: '.ucfirst($this->request->getPost('building')).'<br>Service: '.$this->request->getPost('service').'<br># Room: '.$this->request->getPost('numroom').'<br>Service Date: '. $this->request->getPost('date').'<br> Description: '.$this->request->getPost('description').'<br>
        <br>
        <p><a href="https://totalromerocleaning.com/" class="btn btn-outline-warning">Log In TotalRomeroCleaning</a>
             </p>
                 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
               </body>
             </html>
             ';
    
    $email = \Config\Services::email();
    $email->setTo($to);
    $email->setFrom('notification@totalromerocleaning.com', 'Notification - TotalRomeroCleaning');
    
    $email->setSubject($subject);
    $email->setMessage($message);
    
    $email->send();

    }
}