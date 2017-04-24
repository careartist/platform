<?php

namespace App\Http\Controllers\Artist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Artist\EventType;
use App\Models\Artist\Event;
use Sentinel;

class EventController extends Controller
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
        return view('user.profile.artist.events.index')->withUser(Sentinel::getUser());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.profile.artist.events.create')->withEventTypes(EventType::get());
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

        $user = Sentinel::getUser();

        $event = Event::create([
            'title'         => $request['title'],
            'description'   => $request['description'],
            'type'          => $request['event_type'],
            'price'         => $request['event_price'],
            'start_at'      => $request['start_at'],
            'end_at'        => $request['end_at'],
            'contact_name'  => $request['contact_name'],
            'contact_email' => $request['contact_email'],
            'contact_phone' => $request['contact_phone'],
            'profile_id'    => $user->profile->artist_profile->id
        ]);

        return redirect()->route('events.show', ['event' => $event->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile_artist = Sentinel::getUser()->profile->artist_profile;
        $event = Event::where(['id' => $id, 'profile_id' => $profile_artist->id])->first();

        if(!$event)
        {
            return redirect()->route('events.index');
        }
        
        return view('user.profile.artist.events.show')->withEvent($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile_artist = Sentinel::getUser()->profile->artist_profile;
        $event = Event::where(['id' => $id, 'profile_id' => $profile_artist->id])->first();

        if(!$event)
        {
            return redirect()->route('events.index');
        }
        
        return view('user.profile.artist.events.edit')->withEvent($event);
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
        $profile_artist = Sentinel::getUser()->profile->artist_profile;
        $event = Event::where(['id' => $id, 'profile_id' => $profile_artist->id])->first();

        if(!$event)
        {
            return redirect()->route('events.index');
        }

        $validation = $this->validator($request->all())->validate();

        if($validation)
        {
            return $validation;
        }

        $event->title           = $request['title'];
        $event->description     = $request['description'];
        $event->type            = $request['event_type'];
        $event->price           = $request['event_price'];
        $event->start_at        = $request['start_at'];
        $event->end_at          = $request['end_at'];
        $event->contact_name    = $request['contact_name'];
        $event->contact_email   = $request['contact_email'];
        $event->contact_phone   = $request['contact_phone'];

        $event->save();

        return redirect()->route('events.show', ['event' => $event->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile_artist = Sentinel::getUser()->profile->artist_profile;
        $event = Event::where(['id' => $id, 'profile_id' => $profile_artist->id])->first();

        if(!$event)
        {
            return redirect()->route('events.index');
        }

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
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:2000',
            'event_type' => 'required|string|max:50',
            'event_price' => 'required|string|max:50',
            'start_at' => 'required|string|max:25',
            'end_at' => 'nullable|string|max:25',
            'contact_name' => 'nullable|string|max:50',
            'contact_email' => 'nullable|string|email|max:190',
            'contact_phone' => 'nullable|string|max:20',
        ]);
    }
}
