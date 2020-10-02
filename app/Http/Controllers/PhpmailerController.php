<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PhpmailerController extends Controller
{
    public function index(){
        return 'hello';
    }

    public function sendEmail (Request $request) {
        // is method a POST ?
        // if(Request::isMethod('post')) {
            //   require 'vendor/autoload.php';													// load Composer's autoloader
  
               $mail = new PHPMailer(true);                            // Passing `true` enables exceptions
  
              try {
                  // Server settings
              $mail->SMTPDebug = 0;                                	// Enable verbose debug output
                  $mail->isSMTP();                                     	// Set mailer to use SMTP
                  $mail->Host = 'wb-productions.id';												// Specify main and backup SMTP servers
                  $mail->SMTPAuth = true;                              	// Enable SMTP authentication
                  $mail->Username = 'admin@wb-productions.id';             // SMTP username
                  $mail->Password = 'Wbproductions2020';              // SMTP password
                  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                  $mail->Port = 587;                                    // TCP port to connect to
  
                  //Recipients
                  $mail->setFrom('admin@wb-productions.id', 'Mailer');
                  $mail->addAddress('hafil@wb-productions.id', 'Optional name');	// Add a recipient, Name is optional
                //   $mail->addReplyTo('your-email@gmail.com', 'Mailer');
                //   $mail->addCC('his-her-email@gmail.com');
                //   $mail->addBCC('his-her-email@gmail.com');
  
                  //Attachments (optional)
                  // $mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments
                  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name
  
                  //Content
                  $mail->isHTML(true); 																	// Set email format to HTML
                  $mail->Subject = 'tes using laravel';
                  $mail->Body    = 'hello gaes ini laravel';						// message
  
                  $mail->send();
                  return 'Success!';
              } catch (Exception $e) {
                  return 'Error!';
              }
        //   }
          return 'Mailer';
    }
}
