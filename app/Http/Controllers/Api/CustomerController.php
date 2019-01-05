<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Customer;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

    class CustomerController extends Controller
    {
        public function authenticate(Request $request)
        {
        	if($validate=$this->loginValidations($request)):
        		return $validate;
        	endif;

            $credentials = $request->only('mobile', 'password');
            
         
            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
             //print_r($token);die;
            $message='You are login successfully';
            return response()->json(compact('token','message'),201);
           
        }

        public function registerUser(Request $request)
        {
            
            if($validate=$this->registerValidations($request)):
        		return $validate;
        	endif;

            	if( \App\Models\OtpVerified::where($request->only('mobile','otp'))->exists()):

               
            $user = Customer::create([
                'mobile' => $request->get('mobile'),
                'password' => Hash::make($request->get('password')),
            ]);

            $token = JWTAuth::fromUser($user);

           $message='Thank you for regester with us !';

            return response()->json(compact('token','message'),201);

        else:
 
            $message='Please verify your phone number.';
        	return response()->json(compact('message'),404);

            endif;
        }

        public function getAuthenticatedUser()
            {
                    try {

                            if (! $user = JWTAuth::parseToken()->authenticate()) {
                                    return response()->json(['user_not_found'], 404);
                            }

                    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                            return response()->json(['token_expired'], $e->getStatusCode());

                    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                            return response()->json(['token_invalid'], $e->getStatusCode());

                    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                            return response()->json(['token_absent'], $e->getStatusCode());

                    }

                    return response()->json(compact('user'));
            }

            public function checkUser(Request $request)
            {

            	if($validate=$this->loginValidations($request)):
        		return $validate;
        	endif;

        
              if(Customer::where('mobile',$request->mobile)->exists()):

              	return response()->json(array('mobile_status'=>true),200);


          else:
              
              return response()->json(array('mobile_status'=>false),404);

            endif;

          
            }


            public function loginValidations($request)
            {

            	$rules = ['mobile' => 'required|max:10'];

                if($request->has('password')):

                	$rules['password']='required';

                endif;
                if($request->has('otp')):

                    $rules['otp']='required';

                endif;

            	 $validator = Validator::make($request->all(), $rules);
                    
            if($validator->fails()){

                    return response()->json($validator->errors()->toJson(), 400);
            }

            }

            public function addAddress(Request $request)
            {
            	$user = JWTAuth::parseToken()->authenticate();

            	print_r($user);die;
            }

            public function sendOtp(Request $request)
            {
                $Otp=new \App\Otp($request->mobile);
                $Otp->sendOtp();
            }

            public function resendOtp(Request $request)
            {
                $Otp=new \App\Otp($request->mobile);
                $Otp->resendOtp();
            }

            public function verifyOtp(Request $request)
            {
                $Otp=new \App\Otp($request->mobile);
                $response=$Otp->verifyOtp($request->otp);
                $Php_reponse=json_decode($response);
                if($Php_reponse->type=='success'):
                    \App\Models\OtpVerified::create($request->all());
                endif;
                echo $response;

            }

            public function registerValidations($request)
            {

                $rules = ['mobile' => 'required|max:10|unique:customers,mobile'];

                

                    $rules['password']='required';

                

                    $rules['otp']='required|min:6';

            

                 $validator = Validator::make($request->all(), $rules);
                    
            if($validator->fails()){

                    return response()->json($validator->errors()->toJson(), 400);
            }

            }
    }
