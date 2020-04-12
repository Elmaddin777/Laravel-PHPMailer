<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
    public function sendEmail(){
		
    	$mail = new PHPMailer(true);                            // Passing `true` enables exceptions

			try {
                
				// Server settings
	    	$mail->SMTPDebug = 1;                                	// Enable verbose debug output
				$mail->isSMTP();                                     	// Set mailer to use SMTP
				$mail->Host = 'yourhost.com';											   	// Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                              	// Enable SMTP authentication
				$mail->Username = 'yourusername';                     // SMTP username
				$mail->Password = 'yourpassword';                     // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				//Recipients
				$mail->setFrom('yourmail@yourmail.com', 'yourname');
				$mail->addAddress('recepientmail@recepientmail.com');
			
      	//Content
				$mail->isHTML('true'); 																	// Set email format to HTML
				$mail->Subject = '<p>test</p>';
				$mail->Body    = '<p>test</p>';						// message
				
				$mail->send();
               
				return 'success';
			} catch (Exception $e) {
				return $e;
			}
		
    }
}
