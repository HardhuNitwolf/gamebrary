<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use \App\products;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Swift_Mailer;
use Swift_SendmailTransport;
use Swift_SmtpTransport;
use Swift_Message;
class DonationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /**$this->middleware('auth');**/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('donation');
    }
    public function donation(Request $request){
        $user= \Auth::user();
        
        $name= $request->input('name');
         $status= $request->input('status');
          $comments= $request->input('comments');

        
        
        $mail = new PHPMailer(true);  
       
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'ricardo.torres.landete@gmail.com';                 // SMTP username
        $mail->Password = '';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($user->email, 'Gamebrary');
        $mail->addAddress('ricardo.torres.landete@gmail.com');     // Add a recipient

        $mail->addReplyTo('ricardo.torres.landete@gmail.com', 'Information');


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Nuevo donativo';
        $mail->Body    = "El usuario ".$user->nick." ha realizado la siguiente donación:<br><br> <p>Nombre del juego: ".$name."</p><p>Estado: ".$status."</p><p>Comentarios: ".$comments."</p>";
        $mail->AltBody = "El usuario ".$user->nick." ha realizado la siguiente donación:<br><br> <p>Nombre del juego: ".$name."</p><p>Estado: ".$status."</p><p>Comentarios: ".$comments."</p>";

        $mail->send();
        echo 'Message has been sent';
        return redirect()->action('DonationController@index')
   ->with('alert', 'Gracias por esta donación. Te responderemos tan pronto como sea posible.');
    }
    
}