<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $con = Contact::all();
        return view('admin.page.contact',['con' => $con]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $con = new Contact();
        $con->name = $request->name;
        $con->email = $request->email;
        $con->phone = $request->phone;
        $con->message = $request->message;
        $con->save();
        
        return response()->json('Your message has been sent. Thank You');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $con = Contact::find($id);
        return view('admin.page.editcontact',['edit' => $con]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */

    public function initMail(
        $to='',
        $from='',
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

              $mail->setFrom($from);

              //$mail->addAddress($to, 'Fahad Bhuyian');
              $mail->addAddress($to);               // Name is optional
              $mail->addReplyTo($from,'Trim Wear Limited');
              $mail->addCC('fakhrulislamtalukder@gmail.com','CC Trim Wear Limited Contact Request');
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

    public function update(Request $request, $id)
    {
        
        //echo $request->currentemail;
        $con = Contact::find($id);
        $con->name = $request->name;
        $con->email = $request->email;
        $con->phone = $request->phone;
        $con->message = $request->message;
        $con->reply = $request->reply;
        $con->save();
        //dd($con);
        $to=$request->email;
        $from=$request->currentemail;
        $subject='Contact Request';
        $body=$request->reply;

        $initMail = $this->initMail($to,$from,$subject,$body);
         return redirect('admin/contact/request')->with('status', 'Successfully Send Mail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
