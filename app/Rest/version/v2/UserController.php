<?php

namespace App\Rest\version\v2;

use Illuminate\Http\Request;
use App\Rest\version\v1\UserController as V1UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use PhoneCountryCodes;
use Errors;
use Str;

use App\User;
use App\UserOTP;
use App\SignupLog;
use Carbon\Carbon;

class UserController extends V1UserController
{
    //
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Authentication confirms your identity or is it a process of verifying who you are.
     * if the process is successful, returns user data
     * @param 
     * @return \stdClass
    */
    public function authUser()
    {		
		$validator = Validator::make(request()->all(), [
        	'phone'  => 'required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',
        ],[
        	'phone.regex' => 'Phone pattern mismatch.'
        ]);

        if( $validator->fails() ){
            $this->error->set( Errors::VALIDATE_FAILED , $validator->errors()->first() );
            return $this->error->get();
        }

        $user = User::where('phone_number',request()->phone)->first();
        $userOTP = new UserOTP();

        if( !is_null($user) ){
        	if( $user->isApproved() ){
        		$this->error->set( Errors::CUSTOME_ERROR , 'This phone number already registered and verified');
                return $this->error->get();
            }
        	if( $user->isPending() ){
                if( is_null($user->otp) || $user->otp->isPending() ){
                    $user->setOTP();
                }
                $this->response->data->userId = $user->id;
                $this->response->data->userType = $user->type;
                $this->response->data->status = $user->status;
                return response()->json($this->response, 200)->header('Content-Type', 'application/json');
            }
        }

        $user = new User();
        $user->phone_number = request()->phone;
        $user->type = User::CUSTOMER_TYPE;
        $user->status = User::STATUS_PENDING;
        
        if( !$user->save() ){
			throw new \Exception("User couldn't be  saved");
        }

        $request = new \stdClass();
       	$request->phone = $user->phone_number;
		$request->userType = User::CUSTOMER_TYPE;

        $details = new \stdClass();
		$details->userId   = $user->id;
		$details->userType = User::CUSTOMER_TYPE;
		$details->phone    = $user->phone_number;

		$user->signupLog(SignupLog::TYPE_SIGNUP, SignupLog::STATUS_PASSED, $sender = 0,$request, $details);
		$user->setOTP();
        
		$this->response->data->userId = $user->id;
		$this->response->data->userType = $user->type;
		$this->response->data->status = $user->status;

		return response()->json($this->response, 200)->header('Content-Type', 'application/json');
    }
}
