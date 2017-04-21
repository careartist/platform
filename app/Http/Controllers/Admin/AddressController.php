<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User\Place;
use App\Models\User\Region;
use Sentinel;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Sentinel::getUser();
        return view('admin.profile.address.index')->withUser($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $address = Sentinel::getUser()->profile->address()->first();

        if($address)
        {
            return redirect()->route('admin.profile');
        }

        $regions = Region::select('id', 'place')->orderBy('place', 'asc')->get();

        return view('admin.profile.address.create')->withRegions($regions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = Sentinel::getUser()->profile;

        if($profile->address()->first())
        {
            return redirect()->route('admin.profile');
        }

        $validation = $this->validator($request->all())->validate();

        if($validation)
        {
            return $validation;
        }

        $address = $profile->address()->create([
            'region_id' => $request['region'],
            'place_id' => $request['place'],
            'address' => $request['address'],
        ]);

        $profile->address_id = $address->id;
        $profile->save();

        return redirect()->route('admin.profile');
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
        return view('admin.profile.address.edit')->withUser($user);
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
        $user = Sentinel::getUser();
    }

    public function ajaxCities($region_id)
    {
        return $regions = Place::select('places.id', 'places.place', 'c.id as p_id', 'c.place as p_place')
                        ->leftJoin('places as c', 'c.id', '=', 'places.sirsup')
                        ->whereIn('places.sirsup', Place::select('places.id')
                            ->where('places.sirsup', $region_id)
                            ->get()
                        )
                        ->orderBy('places.fsl', 'asc')->get();
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
            'region' => 'required|numeric',
            'place' => 'required|numeric',
            'address' => 'required|max:190',
        ]);
    }
}
