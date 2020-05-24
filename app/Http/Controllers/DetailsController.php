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

class DetailsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        /*         * $this->middleware('auth');* */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) {
        
        $alquilado = false;
        $user = \Auth::user();
        if($user){
            $rented= DB::table('renting')
                        ->where('product_id', '=', $id)
                        ->where('member_id', '=', $user->id)
                        ->first();


            if($rented){
                $alquilado = true;
            }
            $details = DB::table('product')->where('id', $id)->first();

            return view('details', ['details' => $details, 'alquilado'=> $alquilado]);

        }
        $details = DB::table('product')->where('id', $id)->first();

        return view('details', ['details' => $details]);
       
    }

    public function renting($id) {
        $details = DB::table('product')
                ->where('id', $id)
                ->first();
        $product = DB::table('product')
                
                ->select('stock','select')                
                ->where('id', $id)
                ->decrement('stock', 1)
               
        ;            
        
        $user = \Auth::user();
        $member = DB::table('members')
                ->select('maxRenting')
                ->where('id', $user->id)
                ->decrement('maxRenting', 1)
        ;       
        $start=Carbon::today();
        $endRenting = $start->addDays(5);        

        $rent = DB::table('renting')
                ->join('members', 'renting.member_id', '=', 'members.id')
                ->join('product', 'renting.product_id', '=', 'product.id')
                ->insert(array(
            'member_id' => $user->id,
            'product_id' => $id,
            'iniRenting' => date('Y-m-d'),
            'endRenting' => $endRenting
        ));
         

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
        $mail->setFrom('ricardo.torres.landete@gmail.com', 'Gamebrary');
        $mail->addAddress($user->email, $user->name);     // Add a recipient

        $mail->addReplyTo('ricardo.torres.landete@gmail.com', 'Information');


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $details->typus." alquilado";
        $mail->Body    = "Gracias ".$user->nick.".<br> Acabas de realizar el alquiler de ".$details->name.". "
                . "<br>Recuerda que tiene 5 días para devolverlo. <br><br>Gracias por confiar en nosotros.";
        $mail->AltBody = "Gracias ".$user->nick.".<br> Acabas de realizar el alquiler de ".$details->name.". "
                . "<br>Recuerda que tiene 5 días para devolverlo. <br><br>Gracias por confiar en nosotros.";

        $mail->send();
        echo 'Message has been sent';
        

        
        return redirect()->action('DetailsController@index', ['id' => $id])
   ->with('alert', 'Gracias por alquilar este artículo. Pronto recibirás un e-mail con los detalles.');
    }
    public function recovery($id){
        
        $rented = DB::table ('renting')
                ->join ('members','renting.member_id', '=', 'members.id')
                ->join ('product','renting.product_id', '=', 'product.id')
                
                ->where('member_id',$id)
                ->get();
       
        return view ('recovery',[            
            'rented'=> $rented
          
        ]);
    }
}
