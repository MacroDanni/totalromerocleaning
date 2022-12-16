<?php 
namespace App\Controllers;
use App\Models\FormModel;
use CodeIgniter\Controller;
class SendMail extends Controller
{
    public function sendmail($to,$subject,$message) 
    {
   

      print($to.'<br>');
      print($subject.'<br>');
      print($message);
      die();
      $email = \Config\Services::email();
      $email->setTo($to);
      $email->setFrom('notification@totalromeroscleaning.com', 'Notification - TotalRomerosCleaning');
      
      $email->setSubject($subject);
      $email->setMessage($message);
      $email->send();
  }
}