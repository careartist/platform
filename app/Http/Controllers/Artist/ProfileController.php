<?php

namespace App\Http\Controllers\Artist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User\ArtistProfile;
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
        $this->middleware('artist');
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
        
        $artist_profile = ArtistProfile::where('user_id', Sentinel::getUser()->id)->first();

        if($artist_profile->artist_bio)
        {
            return view('user.profile.artist.index')->with(['user' => $user, 'ucare' => $ucare]);
        }

        return redirect()->route('artist.create');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.profile.artist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $this->validator($request->all())->validate();

        if($validation)
        {
            return $validation;
        }

        $artist_profile = ArtistProfile::where('user_id', Sentinel::getUser()->id)->first();

        $artist_profile->artist_bio()->create([
            'bio' => $request['bio'],
            'tags' => $request['tags'],
            'subdomain' => $request['subdomain'],
        ]);
        return redirect()->route('artist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Get a validator for an incoming address request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'bio' => 'required',
            'tags' => 'required',
            'subdomain' => 'required',
        ]);
    }

}
