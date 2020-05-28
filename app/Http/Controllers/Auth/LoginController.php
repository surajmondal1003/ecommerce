<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Useraddress;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'my-profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login_manual(Request $request)  {  
      
        $this->_validateLogin($request);
        $userdata = array(
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        );
        if(User::where('email',$request->input('email'))->where('status','active')->first()){
            if ($this->attemptLogin($request)) {
                $default_address=Useraddress::where('user_id',Auth::user()->id)
                                            ->where('is_default','1')
                                            ->first();
                  if($default_address){
                  $request->session()->put('pincode',$default_address->pincode);
                  }
                  $redirect_to=$request->session()->get('redirectTo')?$request->session()->get('redirectTo'):'my-profile';

                  return response()->json(['success' => true,'status'=>true, 'redirectto' => $redirect_to]);
              } 
              else {
                  return response()->json(['success' => false,'status'=>true, 'error' => ['Login Failed! Email or password is incorrect.']]);
              }
            }
            else{
                return response()->json(['success' => false,'status'=>true, 'error' => ['Login Failed! Account is Inactive.please activate from email link..']]);
            }
       
      }
    

      private function _validateLogin(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
        }
        if($request->input('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password is required';
			$data['status'] = FALSE;
        }
       
        
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return response()->json(['status' => true, 'redirectto' => 'login']);
    }
    
}
