<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSubscription;
use App\Mail\ContactMail;
use App\Mail\MessageMail;
use App\Mail\ContributorMail;
use App\Subscriber;

class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function _chkvalidateSubscription(Request $request){
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('chksubscription_mail') == '')
		{
			$data['inputerror'][] = 'chksubscription_mail';
			$data['error_string'][] = 'Subscription Mail is required';
			$data['status'] = FALSE;
        }
        if($request->input('chksubscription_mail') != '')
		{
            $count=Subscriber::where('email',$request->input('chksubscription_mail'))->first();
            if($count){
                $data['inputerror'][] = 'chksubscription_mail';
                $data['error_string'][] = 'Email Already Sucbscribed';
                $data['status'] = FALSE;
            }
			
        }
        echo json_encode($data);
       
		// if($data['status'] === FALSE)
		// {
        //     echo json_encode($data);
        //     exit();
			
        // }
        // else{
        //     echo json_encode($data);
        // }
    }
    

    public function save_subscription(Request $request){
        $this->_validateSubscription($request);
        $sender_email=$request->input('subscription_mail');
        $receiver_email='artage.in@gmail.com';

        Subscriber::create(['email'=>$sender_email]);

        Mail::to($receiver_email)
        ->send(new EmailSubscription($sender_email,$receiver_email));

        Mail::to($sender_email)
        ->send(new EmailSubscription($receiver_email,$sender_email));

        $json_data = array('message'=>"Mail sent Succesfully",'status'=>true);

        return response()->json($json_data);
        
    }
   

    private function _validateSubscription(Request $request){
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('subscription_mail') == '')
		{
			$data['inputerror'][] = 'subscription_mail';
			$data['error_string'][] = 'Subscription Mail is required';
			$data['status'] = FALSE;
        }
        if($request->input('subscription_mail') != '')
		{
            $count=Subscriber::where('email',$request->input('subscription_mail'))->first();
            if($count){
                $data['inputerror'][] = 'subscription_mail';
                $data['error_string'][] = 'Email Already Sucbscribed';
                $data['status'] = FALSE;
            }
			
        }
        if($request->input('g-recaptcha-response') == '')
		{
			$data['inputerror'][] = 'g-recaptcha-response';
			$data['error_string'][] = 'Captcha is required';
			$data['status'] = FALSE;
        }
       
       
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }
    

    public function save_contact(Request $request){
        $this->_validateContact($request);
        $sender_email=$request->input('inputEmail');
        $receiver_email='artage.in@gmail.com';

        $inputName=$request->input('inputName');
        $inputPhone=$request->input('inputPhone');
        $inputMessage=$request->input('inputMessage');


        Mail::to($receiver_email)
        ->send(new ContactMail($sender_email,$receiver_email,$inputName,$inputPhone,$inputMessage));

        $json_data = array('message'=>"Mail sent Succesfully",'status'=>true);

        return response()->json($json_data);
        
    }
    

    private function _validateContact(Request $request){
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('inputName') == '')
		{
			$data['inputerror'][] = 'inputName';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
        }
		if($request->input('inputEmail') == '')
		{
			$data['inputerror'][] = 'inputEmail';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
        }
		if($request->input('inputPhone') == '')
		{
			$data['inputerror'][] = 'inputPhone';
			$data['error_string'][] = 'Phone is required';
			$data['status'] = FALSE;
        }
		if($request->input('inputMessage') == 'Message')
		{
			$data['inputerror'][] = 'inputMessage';
			$data['error_string'][] = 'Message is required';
			$data['status'] = FALSE;
        }
		// if($request->input('g-recaptcha-response') == '')
		// {
		// 	$data['inputerror'][] = 'g-recaptcha-response';
		// 	$data['error_string'][] = 'Captcha is required';
		// 	$data['status'] = FALSE;
        // }
       
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }
    

    public function save_message(Request $request){
        $this->_validateMessage($request);
        $sender_email=$request->input('popinputEmail');
        $receiver_email='artage.in@gmail.com';

        $inputName=$request->input('popinputName');
        $inputMessage=$request->input('popinputMessage');

        Mail::to($receiver_email)
        ->send(new MessageMail($sender_email,$receiver_email,$inputName,$inputMessage));

        $json_data = array('message'=>"Mail sent Succesfully",'status'=>true);

        return response()->json($json_data);
        
    }
   

    private function _validateMessage(Request $request){
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('popinputName') == '')
		{
			$data['inputerror'][] = 'popinputName';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
        }
		if($request->input('popinputEmail') == '')
		{
			$data['inputerror'][] = 'popinputEmail';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
        }
		if($request->input('popinputMessage') == '')
		{
			$data['inputerror'][] = 'popinputMessage';
			$data['error_string'][] = 'Message is required';
			$data['status'] = FALSE;
        }
        if($request->input('g-recaptcha-response') == '')
		{
			$data['inputerror'][] = 'g-recaptcha-response';
			$data['error_string'][] = 'Captcha is required';
			$data['status'] = FALSE;
        }
       
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function contributor(){
        return view('front.contributer');
    }

    public function save_contributor(Request $request){
        //$this->_validateMessage($request);
        $data['uploadContent'] = $request->file('uploadContent');
        $data['uploadImage'] = $request->file('uploadImage');
        
       
        $sender_email=$request->input('inputEmail');
        $receiver_email='artage.in@gmail.com';
        
        $inputName=$request->input('firstName').' '.$request->input('lastName');
        $inputPhone=$request->input('inputPhone');
       

        Mail::to($receiver_email)
        ->send(new ContributorMail($sender_email,$receiver_email,$inputName,$inputPhone,
                                    $data));

        $json_data = array('message'=>"Mail sent Succesfully",'status'=>true);

        return response()->json($json_data);
        
    }
    
    
}
