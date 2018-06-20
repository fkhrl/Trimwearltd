<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class MailController extends Controller
{
    public function initMail(
        $to='',
        $subject='',
        $body='',
        $AltBody='This is the body in plain text for non-HTML mail clients',
        $attachment='',
        $debug=0
    )
    {
          $mail = new PHPMailer(true);
          try {
              $mail->SMTPDebug = $debug;
              $mail->isSMTP(); 
              $mail->Host = 'mail.spxce.co';
              $mail->SMTPAuth = true;
              $mail->Username = 'simpleretailpos@spxce.co';
              $mail->Password = '@sdQwe123';
              $mail->SMTPSecure = 'tls';
              $mail->Port = 587;

              $mail->setFrom('info@spxce.co', 'Contact Request');

              //$mail->addAddress($to, 'Fahad Bhuyian');
              $mail->addAddress($to);               // Name is optional
              $mail->addReplyTo('info@simpleretailpos.com', 'Reply - Contact Request');
             // $mail->addCC('cc@example.com');
             // $mail->addBCC('bcc@example.com');

              //Attachments
              if(!empty($attachment))
              {
                 $mail->addAttachment($attachment);
              }
              //$mail->addAttachment('/var/tmp/file.tar.gz');
              //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); 

              //Content
              $mail->isHTML(true);
              $mail->Subject = $subject;
              $mail->Body    = $body;
              $mail->AltBody = $AltBody;
              $mail->send();
              return 1;
          } catch (Exception $e) {
              if($debug>0)
              {
                  return 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
              }
              else
              {
                  return 0;
              }
          }
    }

    public function send($id){
    	//$inputs = Contact::find($id);
    	// dd($inputs);


    	
}
