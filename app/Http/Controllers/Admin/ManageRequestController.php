<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\RoleRequest;
use App\Models\User\ArtistProfile;
use Sentinel;

class ManageRequestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('admin_address');
    }

    public function acceptRequest($id)
    {
    	$request_role = RoleRequest::find($id);
    	$artist_profile = ArtistProfile::find($request_role->artist_profile_id);
    	
		$user = Sentinel::findById($request_role->user_id);
    	$role = Sentinel::findRoleBySlug($request_role->role);
    	$role->users()->attach($user);

    	$request_role->delete();
    	
    	$artist_profile->approved = 1;
    	$artist_profile->operated_by = Sentinel::getUser()->id;
    	$artist_profile->operated_at = \Carbon\Carbon::now();
    	$artist_profile->save();
    	
    	return redirect()->route('requests.index');
    }

    public function rejectRequest($id)
    {
    	$request_role = RoleRequest::find($id);
    	$artist_profile = ArtistProfile::find($request_role->artist_profile_id);

    	$artist_profile->rejected = 1;
    	$artist_profile->operated_by = Sentinel::getUser()->id;
    	$artist_profile->operated_at = \Carbon\Carbon::now();
    	$artist_profile->save();

    	$request_role->delete();
    	
    	return redirect()->route('requests.index');
    }
}
