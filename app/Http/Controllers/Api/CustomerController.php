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
        public function authenticate($request)
        {
        	//$this->checkuser($request);

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

        public function register($request)
        {
            

            $user = Customer::create([
                'mobile' => $request->get('mobile'),
                'password' => Hash::make($request->get('password')),
            ]);

            $token = JWTAuth::fromUser($user);

           $message='Thank you for regester with us !';

            return response()->json(compact('token','message'),201);
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

            public function checkuser(Request $request)
            {

            	$this->loginValidations($request);

        
              if(Customer::where('mobile',$request->mobile)->exists()):

              	if($request->has('password')):

              		return $this->authenticate($request);
              		
                   
              	else:

              	return response()->json(array('mobile_status'=>true),200);

              endif;

          else:

          	if($request->has('password') && $request->verified==true):

                return $this->register($request);

          	else:

          		return response()->json(array('mobile_status'=>false),200);
          	
          	endif;

          	

          endif;


            }


            public function loginValidations($request)
            {
            	$rules = ['mobile' => 'required|max:10'];

                if($request->has('password')):

                	$rules['password']='required';

                endif;

            	 $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                    return response()->json($validator->errors()->toJson(), 400);
            }

            }
    }
