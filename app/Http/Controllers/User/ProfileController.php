<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User\Ucare;
use Sentinel;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin_address');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ucare = Ucare::getLowestUploads();
        $user = Sentinel::getUser();
        $user->ucare_id = $ucare->id;
        $user->save();
        
        return view('user.profile.index')->with(['user' => $user, 'ucare' => $ucare]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Sentinel::getUser();
        return view('user.profile.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $profile = Sentinel::getUser()->profile;

        $validation = $this->validator($request->all(), $profile->id)->validate();

        if($validation)
        {
            return $validation;
        }

        $profile->screen_name = $request['screen_name'];
        $profile->first_name = $request['first_name'];
        $profile->last_name = $request['last_name'];
        $profile->save();

        return redirect()->route('user.profile');
    }

    /**
     * Get a validator for an incoming address request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $id)
    {
        return Validator::make($data, [
            'screen_name' => 'required|max:50|unique:profiles,screen_name,' . $id,
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'phone_number' => 'nullable|numeric|digits:10|unique:profiles,phone_number,' . $id,
        ]);
    }
}
