<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function reset_from_loggedin(Request $request){
        if(Auth::user()){
        $this->_validateResetPassword($request);

        $password=$request->input('inputNewPassword');
        $user=Auth::user();
        $this->resetPassword($user, $password);
        
        Auth::logout();
        Session::flash('message', 'Password Changed Successfully!');
        Session::flash('alert-class', 'alert-success'); 
        }
        else{
            $this->reset($request);
        }
        return response()->json(['status' => true, 'redirectto' => 'login']);
    }

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        // $this->guard()->login($user);
    }

    private function _validateResetPassword(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

	
		if($request->input('inputOldPassword') == '')
		{
			$data['inputerror'][] = 'inputOldPassword';
			$data['error_string'][] = 'Old Password is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputNewPassword') == '')
		{
			$data['inputerror'][] = 'inputNewPassword';
			$data['error_string'][] = 'New Password is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputCnfPassword') == '')
		{
			$data['inputerror'][] = 'inputCnfPassword';
			$data['error_string'][] = 'Confirm Password is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputNewPassword') != $request->input('inputCnfPassword'))
		{
			$data['inputerror'][] = 'inputCnfPassword';
			$data['error_string'][] = 'New Password and Confirm Password Should Match';
			$data['status'] = FALSE;
        }
        
        if($request->input('inputOldPassword') != '')
		{
            // $user=array();
            // $user=User::where('id',Auth::user()->id)->first();
            // if ($user)
            // {
                if(!Hash::check($request->input('inputOldPassword'), Auth::user()->password)){
                $data['inputerror'][] = 'inputOldPassword';
			    $data['error_string'][] = 'Old Password should Match';
                $data['status'] = FALSE;
                }
            // }
        }
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }
}
