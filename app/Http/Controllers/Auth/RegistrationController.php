<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User\Profile;
use Sentinel;

class RegistrationController extends Controller
{
    public function register()
    {
    	return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        // Laravel validation
        $validation = $this->validator($request->all())->validate();

        if($validation)
        {
            return $validation;
        }

    	$data_user = [
    		'email' => $request['email'],
    		'password' => $request['password'],
    		'password_confirm' => $request['password_confirm'],
    	];

    	$user = Sentinel::registerAndActivate($data_user);

    	$prodile = Profile::create([
    		'screen_name' => $request['screen_name'],
    		'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone_number' => $request['phone_number'],
    		'account_type' => $request['account_type'],
    		'user_id' => $user->id,
    	]);

    	return redirect()->route('home');
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
            'screen_name' => 'required|max:50|unique:profiles',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'phone_number' => 'required|numeric|digits:10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }
}