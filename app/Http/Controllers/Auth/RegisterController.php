<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShopinwaySubscription;
use App\Subscriber;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'mobile' => 'required|string|min:10',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'activation_key' => $data['activation_key'],
            'password' => Hash::make($data['password']),
        ]);
        
    }

    public function register(Request $request)
    {
        $this->_validateRegister($request);
       
        $activation_key = $this->getToken();
        $request->request->add(['activation_key' => $activation_key]);
        $user = $this->create($request->all());

        Subscriber::create(['email'=>$request->input('email'),'subscription_status'=>'1']);
        
        //$this->guard()->login($user);
 
        //write a code for send email to a user with activation link
        $data = array('name' => $request['name'], 
                'email' => $request['email'], 
                'activation_link' => url('/account-activation/' . $activation_key));
 
       

        Mail::to($data['email'])
        ->send(new ShopinwaySubscription($data));

        $request->session()->flash('message', 'Registration Sucessfull.Verification Link has been sent to your Email.'); 
        $request->session()->flash('alert-class', 'alert-success');

        return response()->json(['status' => true, 'redirectto' => 'login']);
    
    }

    public function getToken() {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    private function _validateRegister(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

	
		if($request->input('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
        }
        if($request->input('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
        }
        if($request->input('mobile') == '')
		{
			$data['inputerror'][] = 'mobile';
			$data['error_string'][] = 'Mobile image is required';
			$data['status'] = FALSE;
        }
        if($request->input('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password is required';
			$data['status'] = FALSE;
        }
        
        if($request->input('email') != '')
		{
            $pages=array();
            $pages=User::where('email',$request->input('email'))->first();
            if ($pages)
            {
                $data['inputerror'][] = 'email';
			    $data['error_string'][] = 'Email must be unique';
			    $data['status'] = FALSE;
            }
        }
        if($request->input('mobile') != '')
		{
            $pages=array();
            $pages=User::where('mobile',$request->input('mobile'))->first();
            if ($pages)
            {
                $data['inputerror'][] = 'mobile';
			    $data['error_string'][] = 'Mobile must be unique';
			    $data['status'] = FALSE;
            }
        }
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function activation($key)
    {
        $auth_user = User::where('activation_key', $key)->first();
        
        if($auth_user) {
            if($auth_user->status == 'inactive'){
            $auth_user->status = 'active';
            $auth_user->save();
            return redirect('login')->with('success', 'Your account is activated. You can login now.');
            }
            else{
                return redirect('login')->with('error', 'Invalid Token. You may have activated earlier. Please login to continue');
            }
        } else {
            return redirect('login')->with('error', 'Invalid activation key.');
        }
    }
    
}
